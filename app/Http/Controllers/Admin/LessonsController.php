<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLessonRequest;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Http\Requests\PostLessonSchedulerRequest;
use App\Lesson;
use App\LessonSchedule;
use App\LectureClass;
use App\LectureHall;
use App\User;
use App\Department;
use App\WeekDay;
use Gate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LessonsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lesson_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['lessons'] = Lesson::orderBy('updated_at', 'DESC')->get();

        // return LessonSchedule::all();
        return view('admin.lessons.index', $data);
    }

    public function create()
    {
        abort_if(Gate::denies('lesson_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['classes'] = LectureClass::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        // $data['weekDays'] = Lesson::WEEK_DAYS;

        $data['lecturers'] = User::all()->pluck('fname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $data['departments'] = Department::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.lessons.create', $data);
    }

    public function store(StoreLessonRequest $request)
    {
        $data = $request->validated();

        $data['code'] = strtolower(Str::slug($data['title'], '-'));

        // return $data;
        Lesson::create($data);

        return redirect()->route('admin.lessons.index');
    }

    public function edit(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['lesson'] = $lesson;

        // $data['weekday'] = $data["lesson"]->weekDay->name;

        $data['classes'] = LectureClass::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $data['lectureHalls'] = LectureHall::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $data['weekDays'] = WeekDay::all()
                            ->pluck('name', 'id');

        $data['lecturers'] = User::all()->pluck('fname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $data['lesson']->load('classMembers', 'lecturer');

        return view('admin.lessons.edit', $data);
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $data = $request->validated();

        // $data = self::processLessonDay($data);

        $data['lesson'] = $lesson->update($data);

        return redirect()->route('admin.lessons.index');
    }

    public function show(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lesson->load('lecturer', 'classMembers', 'lectureHall');
        $lesson_lecturer = $lesson->load('lecturer');
        $lesson_class = $lesson->load('classMembers');
        $lecturer = $lesson_lecturer->lecturer;
        $data['lecturer_cd'] = User::findOrFail($lesson_lecturer->lecturer->id);
        $data['lesson'] = $lesson;
        
        return view('admin.lessons.show', $data);
    }

    public function indexScheduler()
    {
        abort_if(Gate::denies('lesson_schedule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['lessons'] = Lesson::unscheduled()->get();

        return view('admin.lessons.index_scheduler', $data);
    }


    public function lessonScheduler()
    {
        $data['lessons'] = Lesson::unscheduled()->get();
        $data['lecture_halls'] = LectureHall::where('id', '>', 0)
                                            ->where('capacity', '>=', 0)
                                            ->orderBy('capacity', 'ASC')
                                            ->get();
        
        ini_set('max_execution_time', '99900');
        foreach ($data['lessons'] as $lesson) {
            $lesson_schedules = LessonSchedule::makeSchedule($lesson, $data['lecture_halls']);
        }

        return redirect()->back();
    }


    public function destroy(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lesson->delete();

        return back();
    }

    public function massDestroy(MassDestroyLessonRequest $request)
    {
        Lesson::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
