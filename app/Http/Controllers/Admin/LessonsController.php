<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLessonRequest;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Lesson;
use App\SchoolClass;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LessonsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lesson_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['lessons'] = Lesson::all();

        return view('admin.lessons.index', $data);
    }

    public function create()
    {
        abort_if(Gate::denies('lesson_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['classes'] = SchoolClass::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        
        $data['weekDays'] = Lesson::WEEK_DAYS;

        $data['teachers'] = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.lessons.create', $data);
    }

    public function store(StoreLessonRequest $request)
    {
        $data = $request->validated();
        $weekday = $data["weekday"];
        
        $type_str = ["", "Mon", "Tues", "Wednes", "Thurs", "Fri", "Satur", "Sun"];
        $weekname = ($type_str[$weekday]."day");

        $data["weekname"] = $weekname;
        
        // return $data;
        Lesson::create($data);

        return redirect()->route('admin.lessons.index');
    }

    public function edit(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $classes = SchoolClass::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teachers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lesson->load('class', 'teacher');

        return view('admin.lessons.edit', compact('classes', 'teachers', 'lesson'));
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $lesson->update($request->all());

        return redirect()->route('admin.lessons.index');
    }

    public function show(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lesson->load('class', 'teacher');

        return view('admin.lessons.show', compact('lesson'));
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


    // public function byWeekDay() 
    // {
    //     // $weekDays = array('1'=>'Monday', '2'=>'Tuesday', '3'=>'Wednesday', '4'=>'Thursday', '5'=>'Friday', '6'=>'Saturday', '7'=>'Sunday', ''=>null);
    //     $weekDays = self::WEEK_DAYS;

    //     foreach($weekDays as $index => $day) 
    //     {          
    //         self::CheckNumber($index, $day);                
    //     }
    // }

    // public function CheckNumber($index, $day){         
    //     if($day == '' || is_null($day)){    // add whatever condition you want to check     
    //         echo 'Week day '.$index.' was not found';             
    //     }else{              
    //         echo $day;
    //     }
    // }
}
