<?php

namespace App\Http\Requests;

use App\Lesson;
use App\Rules\LessonTimeAvailabilityRule;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreLessonRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lesson_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title'   => [
                'required',
                'string',
                'min:3'],
            'description'   => [
                'required',
                'string',
                'min:3'],
            'class_id'   => [
                'required',
                'integer'],
            'department_id'   => [
                'required',
                'integer'],
            'lecturer_id' => [
                'required',
                'integer'],
            'weekday'    => [
                'required',
                'integer',
                'min:1',
                'max:7'],
            'start_time' => [
                'required',
                new LessonTimeAvailabilityRule(),
                'date_format:' . config('panel.lesson_time_format')],
            'end_time'   => [
                'required',
                'after:start_time',
                'date_format:' . config('panel.lesson_time_format')],
        ];
    }
}
