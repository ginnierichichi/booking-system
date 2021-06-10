<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Book a Meeting Slot') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
            <form>
                <div class="mb-6">
                    <label for="service" class="inline-block font-bold text-gray-700 mb-2"> Select Service  </label>
                    <select wire:model="state.service" name="service" id="service" class="bg-gray-100 w-full h-10 border-none rounded-lg">
                       <option value="">Select a Service</option>
                        @foreach($services as $slot)
                            <option value="{{$slot->id}}">
                                {{ $slot->name }} ({{ $slot->duration }} mins)
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6 {{ !$employees->count() ? 'opacity-25' : '' }}">
                    <label for="service" class="inline-block font-bold text-gray-700 mb-2"> Select Employee  </label>
                    <select wire:model="state.employee" name="service" id="service" class="bg-gray-100 w-full h-10 border-none rounded-lg" {{ !$employees->count() ? 'disabled = "disabled"' : ''  }}>
                        <option value="">Select an Employee</option>
                        @foreach($employees as $employee)
                            <option value="{{$employee->id}}">
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6 {{ !$this->selectedService || !$this->selectedEmployee ? 'opacity-25' : '' }}">
                    <label for="service" class="inline-block font-bold text-gray-700 mb-2">Select Appointment Time</label>

                    <livewire:booking-calendar :service="$this->selectedService" :employee="$this->selectedEmployee" :key="optional($this->selectedEmployee)->id" />
                </div>

                @if($this->hasDetailsToBook)
                    <div class="text-gray-700 font-bold mb-2">
                        You're ready to book!
                    </div>
                    <div class="border-t border-b border-gray-300 py-2">
                        <div>{{ $this->selectedService->name }} ({{ $this->selectedService->duration }} mins) with {{ $this->selectedEmployee->name }}</div>
                        <div>on {{ $this->timeObject->format('D jS M Y')  }} at {{ $this->timeObject->format('g:i A') }}</div>
                    </div>
                @endif

            </form>
        </div>
    </div>
</div>

