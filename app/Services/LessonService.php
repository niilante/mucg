<?php

namespace App\Services;

use App\Lesson;

class LessonService
{
    public function generateLessonData($weekDays)
    {
        $lessonData = [];
        $timeRange = (new TimeService)->generateTimeRange(config('app.calendar.start_time'), config('app.calendar.end_time'));
        $lessons   = Lesson::with('classMembers', 'lecturer')
                            ->calendarByRoleOrClassId()
                            ->get();

        foreach ($timeRange as $time) {
            $timeText = (date('h:i A', strtotime($time['start'])) ?? '') . ' - ' . (date('h:i A', strtotime($time['end'])) ?? '');
            $lessonData[$timeText] = [];

            foreach ($weekDays as $index => $day) {
                $lesson = $lessons->where('weekday', $index)->where('start_time', $time['start'])->first();

                if ($lesson) {
                    array_push($lessonData[$timeText], [
                        'class_name'   => $lesson->classMembers->name,
                        'lecturer_name' => $lesson->lecturer->name,
                        'title'        => $lesson->title,
                        'rowspan'      => $lesson->difference/30 ?? ''
                    ]);
                } elseif (!$lessons->where('weekday', $index)->where('start_time', '<', $time['start'])->where('end_time', '>=', $time['end'])->count()) {
                    array_push($lessonData[$timeText], 1);
                } else {
                    array_push($lessonData[$timeText], 0);
                }
            }
        }

        return $lessonData;
    }
}
