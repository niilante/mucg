<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lesson;
use App\WeekDay;
use App\StudyMode;
use App\Services\CalendarService;

class CalendarController extends Controller
{
    public function index(CalendarService $calendarService)
    {
        $data['study_modes'] = StudyMode::with(["modeDays","lessonSchedules"])->get();//.lessonSchedules
        // $data['weekDays']     = WeekDay::pluck('name', 'id');
        // return $data['calendarData'] = $calendarService->generateCalendarData($data['weekDays']);

        // return $data;
        return view('admin.calendar', $data);
    }
}
