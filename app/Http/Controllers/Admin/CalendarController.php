<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lesson;
use App\WeekDay;
use App\Services\CalendarService;

class CalendarController extends Controller
{
    public function index(CalendarService $calendarService)
    {
        $data['weekDays']     = WeekDay::all()
                                            ->pluck('name', 'id');
        $data['calendarData'] = $calendarService->generateCalendarData($data['weekDays']);

        // return Lesson::all();
        // return $data;
        return view('admin.calendar', $data);
    }
}
