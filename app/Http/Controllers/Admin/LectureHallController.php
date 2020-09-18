<?php

namespace App\Http\Controllers\Admin;

use App\LectureHall;
use Illuminate\Http\Request;
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

        $data['lectureHalls'] = LectureHall::orderBy('updated_at','DESC')->get();

        return view('admin.lectureHalls.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LectureHall  $lectureHall
     * @return \Illuminate\Http\Response
     */
    public function show(LectureHall $lectureHall)
    {
        abort_if(Gate::denies('lecture_hall_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['LectureHall'] = $LectureHall;

        return view('admin.lectureHalls.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LectureHall  $lectureHall
     * @return \Illuminate\Http\Response
     */
    public function edit(LectureHall $lectureHall)
    {
        $data['LectureHall'] = $LectureHall;

        return view('admin.lectureHalls.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LectureHall  $lectureHall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LectureHall $lectureHall)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LectureHall  $lectureHall
     * @return \Illuminate\Http\Response
     */
    public function destroy(LectureHall $lectureHall)
    {
        //
    }
}
