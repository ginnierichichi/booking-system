<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Schedule;
use App\Models\Service;

class BookingController extends Controller
{
    public function __invoke()
    {
        $schedule = Schedule::find(1);
        $service = Service::find(1);

        $employee = Employee::find(1);

        $slots = $employee->availableTimeSlots($schedule, $service);

        return view('bookings.create', [
            'slots' => $slots,
        ]);
    }
}
