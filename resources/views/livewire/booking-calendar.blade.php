<div>
    <div class="bg-gray-100 rounded-lg">
        <div class="flex items-center justify-center relative">
            @if($this->weekIsGreaterThanCurrent)
            <button type="button" class="p-4 absolute left-0 top-0" wire:click="decrementCalendarWeek">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 hover:text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            @endif
            <div class="text-lg font-semibold p-4 text-gray-800">
                {{ $this->calendarStartDate->format('M Y') }}
            </div>
            <button type="button" class="p-4 absolute right-0 top-0" wire:click="incrementCalendarWeek">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 hover:text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
        <div class="flex justify-between items-center px-3 border-b border-gray-300 pb-2">
            @foreach ($this->calendarWeekInterval as $day)
                <button type="button" wire:click="setDate({{ $day->timestamp }})" class="text-center group cursor-pointer focus:outline-none">
                    <div class="text-xs leading-none mb-2 text-gray-700">
                        {{ $day->format('D') }}
                    </div>
                    <div
                        class="{{ $date === $day->timestamp ? 'bg-blue-200' : '' }} text-lg leading-none p-1 rounded-full w-9 h-9 hover:bg-blue-200 flex items-center justify-center">
                        {{ $day->format('d') }}
                    </div>
                </button>
            @endforeach
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
</div>
