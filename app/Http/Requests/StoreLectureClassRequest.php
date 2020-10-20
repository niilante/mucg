<?php

namespace App\Http\Requests;

use App\LectureClass;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreLectureClassRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lecture_class_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'required'],
        ];
    }
}
