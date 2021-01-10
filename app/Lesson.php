<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\LectureHall;
use App\StudyMode;
use App\StudyModeDay;
use App\LessonSchedule;

class Lesson extends Model
{
    use SoftDeletes;

    public $table = 'lessons';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'study_mode_id',
        'title',
        'description',
        'department_id',
        'lecture_hall_id',
        'duration'
    ];

    // const WEEK_DAYS = [
    //     '1' => 'Monday',
    //     '2' => 'Tuesday',
    //     '3' => 'Wednesday',
    //     '4' => 'Thursday',
    //     '5' => 'Friday',
    //     '6' => 'Saturday',
    //     '7' => 'Sunday',
    // ];

    // const LESSON_SESSIONS = [
    //     '1' => 'Morning',
    //     '2' => 'Evening',
    //     '3' => 'Weekend',
    // ];

    public function studyMode()
    {
        return $this->belongsTo(StudyMode::class, "study_mode_id");
    }

    public function department()
    {
        return $this->belongsTo(Department::class, "department_id");
    }

    public function weekDays()
    {
        return $this->belongsTo(Department::class, "weekday_id");
    }

    public function sessionWeekDays()
    {
        return $this->belongsTo(Department::class, "session_week_day_id");
    }

    public function getDifferenceAttribute()
    {
        return Carbon::parse($this->end_time)->diffInMinutes($this->start_time);
    }

    public function getStartTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('H:i:s', $value)->format(config('panel.lesson_time_format')) : null;
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = $value ? Carbon::createFromFormat(
            config('panel.lesson_time_format'),
            $value
        )->format('H:i:s') : null;
    }

    public function getEndTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('H:i:s', $value)->format(config('panel.lesson_time_format')) : null;
    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = $value ? Carbon::createFromFormat(
            config('panel.lesson_time_format'),
            $value
        )->format('H:i:s') : null;
    }

    public function classMembers()
    {
        return $this->belongsTo(LectureClass::class, 'class_id');
    }

    public function lectureHall()
    {
        return $this->belongsTo(LectureHall::class, 'lecture_hall_id');
    }

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

    public static function isTimeAvailable($weekday, $startTime, $endTime, $class, $lecturer, $lesson)
    {
        $lessons = self::where('weekday', $weekday)
            ->when($lesson, function ($query) use ($lesson) {
                $query->where('id', '!=', $lesson);
            })
            ->where(function ($query) use ($class, $lecturer) {
                $query->where('class_id', $class)
                    ->orWhere('lecturer_id', $lecturer);
            })
            ->where([
                ['start_time', '<', $endTime],
                ['end_time', '>', $startTime],
            ])
            ->count();

        return !$lessons;
    }

    public static function unscheduled()
    {
        return self::whereDoesntHave('lessonSchedules');
    }

    public function lessonSchedules()
    {
        return $this->hasMany(LessonSchedule::class);
    }
    
    public function scopeCalendarByRoleOrClassId($query)
    {
        return $query->when(!request()->input('class_id'), function ($query) {
            $query->when(auth()->user()->is_lecturer, function ($query) {
                $query->where('lecturer_id', auth()->user()->id);
            })
                ->when(auth()->user()->is_student, function ($query) {
                    $query->where('class_id', auth()->user()->class_id ?? '0');
                });
        })
            ->when(request()->input('class_id'), function ($query) {
                $query->where('class_id', request()->input('class_id'));
            });
    }

    public function getSlotsCountAttribute()
    {
        $slot_duration = 15;
        return $this->duration / $slot_duration;
    }

    public function canBeHeldAtDaySlot(LectureHall $lecture_hall, StudyModeDay $day, $slot)
    {
        $lessonStartTime = LessonSchedule::getTimeBySlot($slot)[0]->toTimeString();
        $lessonEndTime = LessonSchedule::getTimeBySlot($slot + $this->slots_count)[1]->toTimeString();

        $undesired_schedules = LessonSchedule::where('lecture_hall_id', $lecture_hall->id)
            ->where('study_mode_day_id', $day->id)
            ->whereBetween('start_time', [$lessonStartTime, $lessonEndTime])
            ->count();

        $undesired_schedules += LessonSchedule::where('lecture_hall_id', $lecture_hall->id)
            ->where('study_mode_day_id', $day->id)
            ->whereBetween('end_time', [$lessonStartTime, $lessonEndTime])
            ->count();

        $undesired_schedules += LessonSchedule::where('lecture_hall_id', $lecture_hall->id)
            ->where('study_mode_day_id', $day->id)
            ->where('start_time', '<=', $lessonStartTime)
            ->where('end_time', '>=', $lessonEndTime)
            ->count();
        
        $slot_ranges_are_free = (bool) $undesired_schedules < 1;
        $all_lecture_slots_are_placeable = ($slot + $this->slots_count) <= 34;

        if ($slot_ranges_are_free && $all_lecture_slots_are_placeable) {
            return true;
        }

        return false;
    }
}
