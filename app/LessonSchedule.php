<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lesson;
use App\LectureHall;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class LessonSchedule extends Model
{
    protected $fillable = [
        'lecture_hall_id',
        'lesson_id',
        'day',
        'end_time',
        'start_time',

        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function makeSchedule(Lesson $lesson, Collection $lecture_halls)
    {
        $available_schedules = [];

        foreach ($lecture_halls as $lecture_hall) {
            if ($temp = $lecture_hall->getAvailableSchedulesByLesson($lesson)) {
                $available_schedules[$lecture_hall->id][] = $temp;
            }
        }
        if ($selected_schedule = self::pickOptimumSchedule($available_schedules)) {
            $temp_time = self::getTimeBySlot($selected_schedule["slot"]);

            $lesson_schedule = new LessonSchedule;
            $lesson_schedule->lesson_id = $lesson->id;
            $lesson_schedule->lecture_hall_id = $selected_schedule["lecture_hall"];
            $lesson_schedule->day = $selected_schedule["day"];
            $lesson_schedule->start_time = $temp_time[0]->toTimeString();

            $temp_time = self::getTimeBySlot($selected_schedule["slot"]+ $lesson->slots_count);
            $lesson_schedule->end_time = $temp_time[0]->toTimeString();
            $lesson_schedule->save();

            return $lesson_schedule;
        }
        return false;
    }

    public static function getTimeBySlot($slot)
    {
        $day_start_time = '08:00:00';
        $slotStartTime = Carbon::createFromTimeString($day_start_time, 'Europe/London');
        $slotStartTime->addMinutes(($slot - 1) * 15);
        $slotEndTime = Carbon::createFromTimeString($day_start_time, 'Europe/London');
        $slotEndTime->addMinutes($slot * 15);


        return [$slotStartTime, $slotEndTime];
    }

    public static function pickOptimumSchedule(array $schedules)
    {
        if (count($schedules) > 0) {
            foreach ($schedules as $lecture_hall => $lh_schedules) {
                foreach ($lh_schedules[0] as $day => $lh_schedule) {
                    return ["lecture_hall" => $lecture_hall, "day" => $day, "slot" => $lh_schedule[0]];
                }
            }
        }
        return false;
    }

    public function classMembers()
    {
        return $this->belongsTo(LectureClass::class, 'class_id');
    }

    public function lectureHall()
    {
        return $this->belongsTo(LectureHall::class, 'lecture_hall_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function lessons()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
}
