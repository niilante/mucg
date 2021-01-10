<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LessonSchedule;

class StudyModeDay extends Model
{
    protected $fillable = [
        'name', 'week_day_id', 'study_mode_id', 'start_time', 'end_time', 'is_active', 'added_by_id'
    ];

    public function lessonSchedules()
    {
        return $this->hasMany(LessonSchedule::class);
    }
}
