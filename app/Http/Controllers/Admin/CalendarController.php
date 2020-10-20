<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lesson;
use App\Services\CalendarService;

class CalendarController extends Controller
{
    public function index(CalendarService $calendarService)
    {
        $data['weekDays']     = Lesson::WEEK_DAYS;
        $data['calendarData'] = $calendarService->generateCalendarData($data['weekDays']);

        return view('admin.calendar', $data);
    }
}
