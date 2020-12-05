<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PluckableTrait;
use App\Lesson;
use Illuminate\Support\Collection;

class LectureHall extends Model
{
    use PluckableTrait;
    protected $fillable = [
        'name',
        'description',
        'code',
        'capacity',
        'added_by_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getRouteKeyName()
    {
        return 'code';
    }

    // public function departmentLessons()
    // {
    //     return $this->hasMany(Lesson::class, 'department_id', 'id');
    // }

    public function addedBy()
    {
        return $this->belongsTo("App\User", "added_by_id");
    }

    public function getAvailableSchedulesByLesson(Lesson $lesson)
    {
        $class_size = $lesson->classMembers->capacity;
                
        if ($class_size > $this->capacity) {
            return false;
        }

        $days = [1,2,3,4,5,6,7];
        $available_schedules = [];

        foreach ($days as $day) {
            if ($temp = $this->getAvailableSchedulesByLessonByDay($lesson, $day)) {
                $available_schedules[$day] = $temp;
            }
        }
        // return array_unique($available_schedules);

        // return dd($available_schedules);
        return $available_schedules;
    }

    public function getAvailableSchedulesByLessonByDay(Lesson $lesson, $day)
    {
        // Where time slots = 30 minutes
        // Day time slots means the number of time slots in a day
        $slot_duration = 30;
        $day_hours = self::getDayHours($day); // should depend on the day -> LectureHall::getDayHours($day)
        $day_time_slots = $day_hours * 60 / $slot_duration;
        $schedules_interval = 0.5;

        $available_slots = [];
        for ($slot = 1; $slot <= $day_time_slots; $slot++) {
            if ($lesson->canBeHeldAtDaySlot($this, $day, $slot)) {
                $available_slots[] = $slot;
            }
        }

        return $available_slots;
    }

    public static function getDayHours($day)
    {
        $hours =  [1 => 18, 2 => 18, 3 => 18, 4 => 18, 5 => 18, 6 => 18, 7 => 18];
        return $hours[$day];
    }
}
