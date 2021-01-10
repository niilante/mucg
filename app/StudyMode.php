<?php

namespace App;

use App\StudyModeDay;
use App\Lesson;
use App\LessonSchedule;
use Illuminate\Database\Eloquent\Model;

class StudyMode extends Model
{
    protected $fillable = [
        'name', 'description', 'code', 'added_by_id'
    ];

    public function modeDays()
    {
        return $this->hasMany(StudyModeDay::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, "study_mode_id");
    }

    public function lessonSchedules()
    {
        return $this->hasManyThrough(LessonSchedule::class, StudyModeDay::class);//, "study_mode_id", "study_mode_day_id"
    }
}
