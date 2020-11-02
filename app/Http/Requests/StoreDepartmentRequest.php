<?php

namespace App\Http\Requests;

use App\Department;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('department_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'   => [
                'required',
                'string',
                'min:3'],
            'description'   => [
                'required',
                'string',
                'min:3'],
            'code'   => [
                'required',
                'unique:departments',
                'string',
                'min:4',
                'max:10']
        ];
    }
}
