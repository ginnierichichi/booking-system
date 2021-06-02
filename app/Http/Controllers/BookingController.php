<?php

namespace App\Http\Controllers;

use App\Bookings\Filters\SlotsPassedTodayFilter;
use App\Bookings\Filters\UnavailabilityFilter;
use App\Bookings\TimeSlotGenerator;
use App\Models\Schedule;
use App\Models\Service;

class BookingController extends Controller
{
    public function __invoke()
    {
        $schedule = Schedule::find(1);
        $service = Service::find(1);

        $slots = (new TimeSlotGenerator($schedule, $service))
            ->applyFilters([
                    new SlotsPassedTodayFilter(),
                    new UnavailabilityFilter($schedule->unavailabilites),
                ])
            ->get();

        return view('bookings.create', [
            'slots' => $slots,
        ]);
    }
}
