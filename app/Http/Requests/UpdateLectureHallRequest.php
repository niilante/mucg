<?php

namespace App\Http\Requests;

use App\LectureHall;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateLectureHallRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('lecture_hall_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $old_lectureHall = $this->route('lecture_hall');

        
        return [
            'name'   => [
                'required',
                'string',
                'min:3'],
            'description'   => [
                'required',
                'string',
                'min:3'],
            'capacity'   => [
                'required',
                'integer',
                'min:1'],
            'code'   => [
                'required',
                'unique:lecture_halls,code,'.$old_lectureHall->id,
                'string',
                'min:4',
                'max:10']
        ];
    }
}
