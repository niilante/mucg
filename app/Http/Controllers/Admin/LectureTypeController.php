<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLectureTypeRequest;
use App\Http\Requests\StoreLectureTypeRequest;
use App\Http\Requests\UpdateLectureTypeRequest;
use App\LectureType;
use Gate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LectureTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('lesson_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['lectureTypes'] = LectureType::orderBy('updated_at', 'DESC')->get();

        return view('admin.lectureTypes.index', $data);
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
     * @param  \App\LectureType  $lectureType
     * @return \Illuminate\Http\Response
     */
    public function show(LectureType $lectureType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LectureType  $lectureType
     * @return \Illuminate\Http\Response
     */
    public function edit(LectureType $lectureType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LectureType  $lectureType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LectureType $lectureType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LectureType  $lectureType
     * @return \Illuminate\Http\Response
     */
    public function destroy(LectureType $lectureType)
    {
        //
    }
}
