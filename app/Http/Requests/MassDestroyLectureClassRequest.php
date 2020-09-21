<?php

namespace App\Http\Requests;

use App\LectureClass;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLectureClassRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lecture_class_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:lecture_classes,id',
        ];
    }
}
