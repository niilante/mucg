@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lectureClass.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lecture-classes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.lectureClass.fields.id') }}
                        </th>
                        <td>
                            {{ $lectureClass->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lectureClass.fields.name') }}
                        </th>
                        <td>
                            {{ $lectureClass->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lecture-classes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#class_lessons" role="tab" data-toggle="tab">
                {{ trans('cruds.lesson.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#class_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="class_lessons">
            @includeIf('admin.lectureClasses.relationships.classLessons', ['lessons' => $lectureClass->classLessons])
        </div>
        <div class="tab-pane" role="tabpanel" id="class_users">
            @includeIf('admin.lectureClasses.relationships.classUsers', ['users' => $lectureClass->classUsers])
        </div>
    </div>
</div>

@endsection
