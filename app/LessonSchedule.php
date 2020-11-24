<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lesson;
use App\LectureHall;
use Collection;

class LessonSchedule extends Model
{
    protected $fillable = [
        'lecture_hall_id',
        'lesson_id',
        'end_time',
        'start_time',

        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function makeSchedule(Lesson $lesson, array $lecture_halls)
    {
        $available_schedules = new Collection();

        foreach ($lecture_halls as $lecture_hall) {
            if ($temp = $lecture_hall->getAvailableSchedulesByLesson($lesson)) {
                $available_schedules = $available_schedules->merge($temp);
            }
        }
        if ($selected_schedule = self::pickOptimumSchedule($available_schedules)) {
            $selected_schedule->lesson_id = $lesson->id;
            $selected_schedule->save();

            return $selected_schedule;
        }
        return false;
    }

    public static function pickOptimumSchedule(Collection $schedules)
    {
        if (count($schedules) > 0) {
            return $schedules[0];
        }
        return false;
    }
}
