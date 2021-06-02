<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __invoke()
    {
        $schedule = Schedule::find(2);
        $slots = CarbonInterval::minute(15)
            ->toPeriod($schedule->start_time, $schedule->end_time);

        return view('bookings.create', [
            'slots' => $slots,
        ]);
    }
}
