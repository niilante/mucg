<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLectureClassRequest;
use App\Http\Requests\UpdateLectureClassRequest;
use App\Http\Resources\Admin\LectureClassResource;
use App\LectureClass;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LectureClassesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lecture_class_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LectureClassResource(LectureClass::all());
    }

    public function store(StoreLectureClassRequest $request)
    {
        $lectureClass = LectureClass::create($request->all());

        return (new LectureClassResource($lectureClass))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(LectureClass $lectureClass)
    {
        abort_if(Gate::denies('lecture_class_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LectureClassResource($lectureClass);
    }

    public function update(UpdateLectureClassRequest $request, LectureClass $lectureClass)
    {
        $lectureClass->update($request->all());

        return (new LectureClassResource($lectureClass))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(LectureClass $lectureClass)
    {
        abort_if(Gate::denies('lecture_class_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lectureClass->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
