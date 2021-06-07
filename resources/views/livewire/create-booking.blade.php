<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Book a Meeting Slot') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
{{--                @foreach($slots as $slot)--}}
{{--                    {{ $slot }} <br>--}}
{{--                @endforeach--}}
            <form>
                <label for="service" class="inline-block font-bold text-gray-700 mb-2"> Select Service  </label>
                <select name="service" id="service" class="bg-gray-100 w-full h-10 border-none rounded-lg">
                    <option value=""></option>
                </select>
            </form>
        </div>
    </div>
</div>

