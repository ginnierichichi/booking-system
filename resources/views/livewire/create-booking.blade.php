<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Book a Meeting Slot') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
            <form wire:submit.prevent="createBooking">
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
                    <label for="employee" class="inline-block font-bold text-gray-700 mb-2"> Select Employee  </label>
                    <select wire:model="state.employee" name="employee" id="employee" class="bg-gray-100 w-full h-10 border-none rounded-lg" {{ !$employees->count() ? 'disabled = "disabled"' : ''  }}>
                        <option value="">Select an Employee</option>
                        @foreach($employees as $employee)
                            <option value="{{$employee->id}}">
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6 {{ !$this->selectedService || !$this->selectedEmployee ? 'opacity-25' : '' }}">
                    <label for="employee" class="inline-block font-bold text-gray-700 mb-2">Select Appointment Time</label>

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
                    <div class="mb-6">
                        <div class="mb-3">
                            <label for="name" class="inline-block font-bold text-gray-700 mb-2"> Your name </label>
                            <input type="text" name="name" id="name" class="bg-gray-100 h-10 w-full border-gray-200 rounded-lg" wire:model="state.name"/>
                            @error('state.name')
                                <div class="font-semibold text-red-500 text-sm mt-2">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="inline-block font-bold text-gray-700 mb-2"> Your email </label>
                            <input type="text" name="email" id="email" class="bg-gray-100 h-10 w-full border-gray-200 rounded-lg" wire:model="state.email"/>
                            @error('state.email')
                            <div class="font-semibold text-red-500 text-sm mt-2">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="bg-indigo-500 text-white h-11 text-center font-bold rounded-lg w-full">Book now</button>
                @endif
            </form>
        </div>
    </div>
</div>

