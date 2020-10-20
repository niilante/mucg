<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLectureClassRequest;
use App\Http\Requests\StoreLectureClassRequest;
use App\Http\Requests\UpdateLectureClassRequest;
use App\LectureClass;
use Gate;
use \Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LectureClassesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lecture_class_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lectureClasses = LectureClass::all();

        return view('admin.lectureClasses.index', compact('lectureClasses'));
    }

    public function create()
    {
        abort_if(Gate::denies('lecture_class_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lectureClasses.create');
    }

    public function store(StoreLectureClassRequest $request)
    {
        $lectureClass = LectureClass::create($request->all());

        return redirect()->route('admin.lecture-classes.index');
    }

    public function edit(LectureClass $lectureClass)
    {
        abort_if(Gate::denies('lecture_class_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lectureClasses.edit', compact('lectureClass'));
    }

    public function update(UpdateLectureClassRequest $request, LectureClass $lectureClass)
    {
        $lectureClass->update($request->all());

        return redirect()->route('admin.lecture-classes.index');
    }

    public function show(LectureClass $lectureClass)
    {
        abort_if(Gate::denies('lecture_class_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['user'] = Auth::user();
        $data['lectureClass'] = $lectureClass->load('classLessons', 'classUsers');

        return view('admin.lectureClasses.show', $data);
    }

    public function destroy(LectureClass $lectureClass)
    {
        abort_if(Gate::denies('lecture_class_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lectureClass->delete();

        return back();
    }

    public function massDestroy(MassDestroyLectureClassRequest $request)
    {
        LectureClass::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
