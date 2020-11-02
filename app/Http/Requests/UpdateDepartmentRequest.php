<?php

namespace App\Http\Requests;

use App\Department;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('department_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $old_department = $this->route('department');

        
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
                'unique:departments,code,'.$old_department->id,
                'string',
                'min:4',
                'max:10']
        ];
    }
}
