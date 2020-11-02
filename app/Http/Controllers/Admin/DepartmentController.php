<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\MassDestroyDepartmentRequest;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['departments'] = Department::orderBy('updated_at', 'DESC')->get();

        return view('admin.departments.index', $data);
    }

    public function create()
    {
        abort_if(Gate::denies('department_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $data[''] = Department::orderBy('updated_at', 'DESC')->get();

        return view('admin.departments.create');
    }

    public function store(StoreDepartmentRequest $request)
    {
        $data = $request->validated();

        Department::create($data);

        return redirect()->route('admin.departments.index');
    }

    public function show(Department $department)
    {
        abort_if(Gate::denies('department_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['department'] = $department;

        return view('admin.departments.show', $data);
    }

    public function edit(Department $department)
    {
        $data['department'] = $department;

        return view('admin.departments.edit', $data);
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $data = $request->validated();

        $data['department'] = $department->update($data);

        return redirect()->route('admin.departments.index');
    }

    public function destroy(Department $department)
    {
        //
    }

    public function massDestroy(MassDestroyDepartmentRequest $request)
    {
        Department::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
