<?php

namespace App\Services;

use App\Lesson;

class CalendarService
{
    public function generateCalendarData($weekDays)
    {
        $calendarData = [];
        $timeRange = (new TimeService)->generateTimeRange(config('app.calendar.start_time'), config('app.calendar.end_time'));
        $lessons   = Lesson::with('classMembers', 'lecturer', 'lectureHall')
            ->calendarByRoleOrClassId()
            ->get();

        foreach ($timeRange as $time) {
            $timeText = (date('h:i A', strtotime($time['start'])) ?? '') . ' - ' . (date('h:i A', strtotime($time['end'])) ?? '');
            $calendarData[$timeText] = [];

            foreach ($weekDays as $index => $day) {
                $lesson = $lessons->where('weekday', $index)->where('start_time', $time['start'])->first();

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
