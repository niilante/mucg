<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLessonRequest;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Http\Requests\PostLessonSchedulerRequest;
use App\Lesson;
use App\LectureClass;
use App\LectureHall;
use App\User;
use App\Department;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LessonsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lesson_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['lessons'] = Lesson::orderBy('updated_at', 'DESC')->get();

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

        // $data = self::processLessonDay($data);

        // Start of Logic For Lecture Hall Sorting Before Saving

        // $data['class_size'] = LectureClass::where('id', $data['class_id'])->first()->capacity;

        // $data['lecture_hall_capacity'] = LectureHall::orderBy('capacity', 'DESC')
        //                                                     ->pluck('capacity')->toArray();

        // foreach ($data['lecture_hall_capacity'] as $key => $val) {
        //     if ($val > $data['class_size']) {
        //         $data['class_size'] = $val;
        //     }
        // }
        
        // $data['class_size'];

        // $data['lecture_hall_capacity_first'] = $data['lecture_hall_capacity'][0];

        // if ($data['lecture_hall_capacity_first'] >= $data['class_size']) {
        //     $data['lecture_hall_capacity_first'];
        // }
        
        // $data['lecture_hall_id'] = LectureHall::getIdByCustomField('capacity', $data["lecture_hall_capacity_first"]);
        
        // End of Logic For Lecture Hall Sorting Before Saving

        Lesson::create($data);

        return redirect()->route('admin.lessons.index');
    }

    public function edit(Lesson $lesson)
    {
        // return 'ddfdf';
        abort_if(Gate::denies('lesson_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['lesson'] = $lesson;

        $data['weekday'] = $data["lesson"]->weekname;

        $data['classes'] = LectureClass::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $data['lectureHalls'] = LectureHall::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $data['weekDays'] = Lesson::WEEK_DAYS;

        $data['lecturers'] = User::all()->pluck('fname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $data['lesson']->load('class', 'lecturer');

        return view('admin.lessons.edit', $data);
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        // return 'dcdcdc';
        return $data = $request->validated();

        $data = self::processLessonDay($data);

        $data['lesson'] = $lesson->update($data);

        return redirect()->route('admin.lessons.index');
    }

    public function show(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lesson->load('lecturer', 'class', 'lectureHall');
        $lesson_lecturer = $lesson->load('lecturer');
        $lesson_class = $lesson->load('class');
        $lecturer = $lesson_lecturer->lecturer;
        $data['lecturer_cd'] = User::findOrFail($lesson_lecturer->lecturer->id);
        // return $data['lecturer'] = User::where('lecturer_id', $lesson_lecturer->id)->get();

        $data['lesson'] = $lesson;
        // return $data;
        return view('admin.lessons.show', $data);
    }

    public function indexScheduler()
    {
        abort_if(Gate::denies('lesson_schedule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['lessons'] = Lesson::where('lecture_hall_id', '=', null)
                                    ->where('weekname', '=', null)
                                    ->where('start_time', '=', null)
                                    ->where('end_time', '=', null)
                                    ->get();

        return view('admin.lessons.index_scheduler', $data);
    }

    public function postLessonScheduler(Request $request, Lesson $lesson)
    {
        $data = $request->validated();

        $data['lesson'] = $lesson->update($data);

        return redirect()->route('admin.lessons.index_scheduler');
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

    public static function processLessonDay(array $data)
    {
        $weekday = $data["weekday"];

        $type_str = ["", "Mon", "Tues", "Wednes", "Thurs", "Fri", "Satur", "Sun"];
        $weekname = ($type_str[$weekday]."day");

        $data["weekname"] = $weekname;

        return $data;
    }
}
