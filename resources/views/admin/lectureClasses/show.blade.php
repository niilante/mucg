@extends('layouts.admin')
@section('title', __('Lecture Class Details'))
@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-layers bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ trans('global.show') }} {{ trans('cruds.lectureClass.title_singular') }}</h5>
                            <span>{{ trans('cruds.lectureClass.title_singular') }} Details</span>
                        </div>
                    </div>
                </div>
                @can('lesson_edit')
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <div>
                                <a href="{{route('admin.lecture-classes.edit', $lectureClass->id)}}" class="btn btn-outline-secondary">
                                    <i class="ik ik-edit-2"></i>
                                    {{ trans('global.edit') }} Lecture Class
                                </a>
                                <a href="{{ route('admin.lecture-classes.index') }}" class="btn btn-outline-info">
                                    <i class="ik ik-list"></i>
                                    {{ trans('global.back_to_list') }}
                                </a>
                            </div>
                        </nav>
                    </div>
                @endcan
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <small class="text-muted d-block pt-10">{{ trans('cruds.lectureClass.fields.name') }}</small>
                        <h5>{{ $lectureClass->name }}</h5>
                        <small class="text-muted d-block pt-10">{{ trans('cruds.lectureClass.fields.capacity') }}</small>
                        <h5>{{ $lectureClass->capacity }}</h5>
                        <small class="text-muted d-block pt-10">{{ trans('cruds.lectureClass.fields.department') }}</small>
                        <h5>{{ $lectureClass->department->name ?? ""}}</h5>
                    </div>
                </div>
            </div>
            {{-- {{ $user->getIsAdmin() }} --}}
            @if( $user->getIsLecturer() || $user->getIsStudent() || $user->getIsAdmin())
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="pills-timeline-tab" data-toggle="pill" href="#lectureClass_lessons" role="tab" aria-controls="pills-timeline" aria-selected="true">{{ trans('cruds.lesson.title') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#lectureClass_time_tables" role="tab" aria-controls="pills-profile" aria-selected="false">Time Table</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                        </li> --}}
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="lectureClass_lessons" role="tabpanel" aria-labelledby="pills-timeline-tab">
                            <div class="card-body">
                                @includeIf('admin.lectureClasses.relationships.lecturerLessons', ['lessons' => $lectureClass->lecturerLessons])
                            </div>
                        </div>

                        <div class="tab-pane fade" id="lectureClass_time_tables" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                                {{-- {{ route('admin.calendar.index') }}?class_id={{ $lectureClass->id }} --}}
                                @includeIf('admin.lectureClasses.relationships.lecturerTimeTables', ['lessons' => $lectureClass->lecturerLessons])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        

    </div>
</div>

{{-- <div class="card">
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
</div> --}}

@endsection
