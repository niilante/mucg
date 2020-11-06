<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PluckableTrait;
use App\Lesson;
use Collection;

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
        $available_schedules = new Collection;

        foreach ($days as $day) {
            if ($temp = $this->getAvailableSchedulesByLessonByDay($lesson, $day)) {
                $available_schedules->merge($temp);
            }
        }

        return $available_schedules;
    }

    public function getAvailableSchedulesByLessonByDay(Lesson $lesson, $day)
    {
        // Where time slots = 30 minutes
        // Day time slots means the number of time slots in a day
        $day_time_slots = 17;
        $schedules_interval = 0.5;
        // if
    }
}
