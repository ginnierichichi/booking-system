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
                                {{ $slot->name }}
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
                </div>
                <div class="bg-gray-100 rounded-lg">
                    <div class="flex items-center justify-center relative">
                        <button type="button" class="p-4 absolute left-0 top-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 hover:text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <div class="text-lg font-semibold p-4 text-gray-800">
                            Jan 2022
                        </div>
                        <button type="button" class="p-4 absolute right-0 top-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 hover:text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex justify-between items-center px-3 border-b border-gray-300 pb-2">
                        <button type="button" class="text-center group cursor-pointer focus:outline-none">
                            <div class="text-xs leading-none mb-2 text-gray-700">
                                Day
                            </div>
                            <div class="text-lg leading-none p-1 rounded-full w-9 h-9 hover:bg-blue-200 flex item-center justify-center">
                                1
                            </div>
                        </button>
                    </div>
                    <div class="max-h-52 overflow-y-scroll">
                        <input type="radio" name="time" id="" value="" class="sr-only" />
                        <label for="" class="w-full text-left focus:outline-none px-4 py-2 cursor-pointer flex items-center border-b border-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            9:00
                        </label>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

