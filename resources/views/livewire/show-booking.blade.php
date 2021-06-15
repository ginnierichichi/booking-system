<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
           <div class="mb-4">{{ $appointment->client_name }} thanks for your booking!</div>

            <div class="border-t border-b border-gray-200 py-2">
                {{ $appointment->service->name }} ({{$appointment->service->duration}} minutes) with {{ $appointment->employee->name }}
                <div>
                    on {{ $appointment->date->format('D jS M Y') }} at {{ $appointment->start_time->format('g:i A') }}
                </div>
            </div>

            <button
                x-data = "{
                confirmCancellation() {
                        if (window.confirm('Are you sure?') {
                            @this.call('cancelBooking')
                        }
                    }
                }"
                x-on:click="confirmCancellation"
                type="button"
                class="bg-indigo-500 text-white h-11 text-center font-bold rounded-lg w-full">
                Cancel Booking
            </button>

            @if($appointment->isCancelled())
                <p>This booking has been cancelled</p>
            @endif
        </div>
    </div>
</div>
