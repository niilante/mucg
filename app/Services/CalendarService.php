<?php

namespace App\Services;

use App\Lesson;
use App\LessonSchedule;

class CalendarService
{
    public function generateCalendarData($weekDays)
    {
        $calendarData = [];
        $timeRange = (new TimeService)->generateTimeRange(config('app.calendar.start_time'), config('app.calendar.end_time'));
        $lessons   = Lesson::with('classMembers', 'lecturer')
            ->calendarByRoleOrClassId()
            ->get();
        $lesson_schedules = LessonSchedule::with('lessons', 'lectureHall')->get();
        dd($lesson_schedules);
        // return $lesson_schedules;
        foreach ($timeRange as $time) {
            dd($time);
            return $timeText = (date('h:i A', strtotime($time['start'])) ?? '') . ' - ' . (date('h:i A', strtotime($time['end'])) ?? '');
            $calendarData[$timeText] = [];

            // return $time;
            foreach ($weekDays as $index => $day) {
                // dd($lesson_schedules->first());
                // return $lesson = $lessons->first();
                // return $time['start'];
                
                return ($lesson_schedule = $lesson_schedules->where('day', $index)->first());
                // dd($lesson_schedule = $lesson_schedules->where('day', $index)->where('start_time', $time['start'])->first());
                // return $lesson;
                if ($lesson) {
                    array_push($calendarData[$timeText], [
                        'class_name'   => $lesson->classMembers->name ?? '',
                        'lecturer_name' => $lesson->lecturer->fname ?? '',
                        'lecture_hall_name' => $lesson->lectureHall->name ?? '',
                        'title'        => $lesson->title,
                        'rowspan'      => $lesson->difference/30 ?? ''
                    ]);
                } elseif (!$lessons->where('weekday', $index)->where('start_time', '<', $time['start'])->where('end_time', '>=', $time['end'])->count()) {
                    array_push($calendarData[$timeText], 1);
                } else {
                    array_push($calendarData[$timeText], 0);
                }
            }
        }

        return $calendarData;
    }
}
