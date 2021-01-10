<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PluckableTrait;
use App\Lesson;
use App\StudyModeDay;
use Illuminate\Support\Collection;
use Carbon\Carbon;

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

        // $days = [1,2,3,4,5,6,7];
        // $days = $lesson->studyMode->modeDays->pluck("id")->toArray();
        $days = $lesson->studyMode->modeDays;
        $available_schedules = [];

        foreach ($days as $day) {
            if ($temp = $this->getAvailableSchedulesByLessonByDay($lesson, $day)) {
                $available_schedules["mode_days"][$day->id] = $day;
                $available_schedules[$day->week_day_id] = $temp;
            }
        }
        // return array_unique($available_schedules);

        // return dd($available_schedules);
        return $available_schedules;
    }

    public function getAvailableSchedulesByLessonByDay(Lesson $lesson, StudyModeDay $day)
    {
        // Where time slots = 30 minutes
        // Day time slots means the number of time slots in a day
        $slot_duration = config('app.calendar.slot_duration');
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

    public static function getDayHours(StudyModeDay $day)
    {
        $time_zone = config('app.calendar.time_zone');
        $startTime = Carbon::createFromTimeString($day->start_time, $time_zone);
        $endTime = Carbon::createFromTimeString($day->end_time, $time_zone);
        $hours = $startTime->diffInHours($endTime);
        
        return $hours;
    }
}
