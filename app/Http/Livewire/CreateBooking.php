<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Service;
use Livewire\Component;

class CreateBooking extends Component
{
    public $employees;

    public $state = [
        'service' => '',
        'employee'=> '',
    ];

    public function mount()
    {
        //initialise
        $this->employees = collect();
    }

    public function updatedStateService($serviceId)
    {
        //load in list of employees
        $this->state['employee'] = '';

        if(!$serviceId) {
            $this->employees = collect();
            return;
        }

        $this->employees = $this->selectedService->employees;
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

    public function render()
    {
        $services = Service::get();

        return view('livewire.create-booking', [
            'services' => $services,
        ]);
    }
}
