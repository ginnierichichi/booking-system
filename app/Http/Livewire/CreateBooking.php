<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Employee;
use App\Models\Service;
use Carbon\Carbon;
use Livewire\Component;

class CreateBooking extends Component
{
    public $employees;

    public $state = [
        'service' => '',
        'employee'=> '',
        'time' => '',
        'name' => '',
        'email' => ''
    ];

    protected function rules() {
        return [
            'state.service' => 'required|exists:services,id',
            'state.employee' => 'required|exists:employees,id',
            'state.time' => 'required|numeric',
            'state.name' => 'required',
            'state.email' => 'required|email',
        ];
    }

    protected $listeners =['updated-booking-time' => 'setTime'];

    public function mount()
    {
        //initialise
        $this->employees = collect();
    }

    public function setTime($time)
    {
        $this->state['time'] = $time;
    }

    public function updatedStateService($serviceId)
    {
        //load in list of employees
        $this->state['employee'] = '';

        if(!$serviceId) {
            $this->employees = collect();
            return;
        }

        //if service is updated clear selected time field
        $this-> clearTime();

        $this->employees = $this->selectedService->employees;
    }


    public function updatedStateEmployee()
    {
        $this->clearTime();
    }

    public function clearTime()
    {
        $this->state['time'] = '';
    }

    public function createBooking()
    {
        $this->validate();

        $bookingFields = [
            'date' => $this->timeObject->toDateString(),
            'start_time' => $this->timeObject->toTimeString(),
            'end_time' => $this->timeObject->clone()
                ->addMinutes($this->selectedService->duration)
                ->toTimeString(),
            'client_name' => $this->state['name'],
            'client_email'=> $this->state['email'],
        ];

        $appointment = Appointment::make($bookingFields);

        $appointment->service()->associate($this->selectedService); //insert servcie_id
        $appointment->employee()->associate($this->selectedEmployee);

        $appointment->save();

        return redirect()->to(route('bookings.show', $appointment). '?token='. $appointment->token);
    }

    public function getSelectedServiceProperty()
    {
        if (!$this->state['service']) {
            return null;
        }

        return Service::find($this->state['service']);
    }

    //cached for the lifecycle of the livewire component.
    public function getSelectedEmployeeProperty()
    {
        if (!$this->state['employee']) {
            return null;
        }

        return Employee::find($this->state['employee']);
    }

    public function getHasDetailsToBookProperty()
    {
        return $this->state['service'] && $this->state['employee'] && $this->state['time'];
    }

    public function getTimeObjectProperty()
    {
        return Carbon::createFromTimestamp($this->state['time']);
    }

    public function render()
    {
        $services = Service::get();

        return view('livewire.create-booking', [
            'services' => $services,
        ]);
    }
}
