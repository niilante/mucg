<?php

namespace App\Http\Controllers\Admin;

use App\LectureHall;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyLectureHallRequest;
use App\Http\Requests\StoreLectureHallRequest;
use App\Http\Requests\UpdateLectureHallRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

class LectureHallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('lecture_hall_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['lectureHalls'] = LectureHall::orderBy('updated_at', 'DESC')->get();

        return view('admin.lectureHalls.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('lecture_hall_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lectureHalls.create');
    }

    public function store(StoreLectureHallRequest $request)
    {
        $data = $request->validated();

        LectureHall::create($data);

        return redirect()->route('admin.lecture-halls.index');
    }

    public function show(LectureHall $lectureHall)
    {
        $lectureHall;
        abort_if(Gate::denies('lecture_hall_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['lectureHall'] = $lectureHall;

        return view('admin.lectureHalls.show', $data);
    }

    public function edit(LectureHall $lectureHall)
    {
        $data['lectureHall'] = $lectureHall;

        return view('admin.lectureHalls.edit', $data);
    }

   
    public function update(UpdateLectureHallRequest $request, LectureHall $lectureHall)
    {
        $data = $request->validated();

        $data['lectureHall'] = $lectureHall->update($data);

        // return view('admin.lectureHalls.index', $data);

        return redirect()->route('admin.lecture-halls.index');
    }

    public function destroy(LectureHall $lectureHall)
    {
        //
    }

    public function massDestroy(MassDestroyLectureHallRequest $request)
    {
        LectureHall::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
