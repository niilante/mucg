<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\LectureHall;
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
        'title',
        'description',
        'weekday_id',
        'code',
        'duration',
        'session_week_day_id',
        'lecture_hall_id',
        'class_id',
        'end_time',
        'lecturer_id',
        'department_id',
        'start_time',
        'created_at',
        'updated_at',
        'deleted_at',
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

    public funtion getSlotsCountAttribute()
    {
        $slot_duration = 30;
        return $this->duration / $slot_duration;
    }

    public function canBeHeldAtDaySlot(LectureHall $lecture_hall, $day, $slot)
    {
        $day_start_time = '08:00:00';
        $lessonStartTime = Carbon::createFromTimeString($day_start_time, 'Europe/London');
        $lessonStartTime->addHours(($slot - 1) * 0.5);
        $lessonEndTime = Carbon::createFromTimeString($day_start_time, 'Europe/London');
        $lessonEndTime->addHours(($slot + $this->slots_count - 1) * 0.5);

        $undesired_schedules = LessonSchedule::where('lecture_hall_id', $lecture_hall->id)
            ->where('lesson_id', $this->id)
            ->where('day', $day)
            ->whereBetween('start_time', [$lessonStartTime->toTimeString(), $lessonEndTime->toTimeString()])
            ->count();

        $undesired_schedules += LessonSchedule::where('lecture_hall_id', $lecture_hall->id)
            ->where('lesson_id', $this->id)
            ->where('day', $day)
            ->whereBetween('end_time', [$lessonStartTime->toTimeString(), $lessonEndTime->toTimeString()])
            ->count();

        $undesired_schedules += LessonSchedule::where('lecture_hall_id', $lecture_hall->id)
            ->where('lesson_id', $this->id)
            ->where('day', $day)
            ->where('start_time', '<=', $lessonStartTime->toTimeString())
            ->where('end_time', '>=', $lessonEndTime->toTimeString())
            ->count();
        

        $slot_ranges_are_free = (bool) $undesired_schedule;
        $all_lecture_slots_are_placeable = ($slot + $this->slots_count) <= 17;

        if ($slot_ranges_are_free && $all_lecture_slots_are_placeable) {
            return true;
        }

        return false;
    }
}
