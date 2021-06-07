<?php

namespace App\Http\Livewire;

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

    public function render()
    {
        $services = Service::get();

        return view('livewire.create-booking', [
            'services' => $services,
        ]);
    }
}
