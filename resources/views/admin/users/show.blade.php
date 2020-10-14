@extends('layouts.admin')
@section('title', __('User Details'))
@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-layers bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ trans('global.show') }} {{ trans('cruds.user.title_singular') }}</h5>
                            <span>{{ trans('cruds.user.title_singular') }} Details</span>
                        </div>
                    </div>
                </div>
                @can('lesson_edit')
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <div>
                                <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-outline-secondary">
                                    <i class="ik ik-edit-2"></i>
                                    {{ trans('global.edit') }} User
                                </a>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-info">
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
                        <small class="text-muted d-block pt-10">{{ trans('cruds.user.fields.id') }}</small>
                        <h5>{{ $user->id }}</h5>
                        <small class="text-muted d-block pt-10">{{ trans('cruds.user.fields.name') }}</small>
                        <h5>{{ $user->fname }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="pills-timeline-tab" data-toggle="pill" href="#lecturer_lessons" role="tab" aria-controls="pills-timeline" aria-selected="true">{{ trans('cruds.lesson.title') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#lecturer_time_tables" role="tab" aria-controls="pills-profile" aria-selected="false">Time Table</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                        </li> --}}
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="lecturer_lessons" role="tabpanel" aria-labelledby="pills-timeline-tab">
                            <div class="card-body">
                                @includeIf('admin.users.relationships.lecturerLessons', ['lessons' => $user->lecturerLessons])
                            </div>
                        </div>

                        <div class="tab-pane fade" id="lecturer_time_tables" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                                {{-- {{ route('admin.calendar.index') }}?class_id={{ $lectureClass->id }} --}}
                                @includeIf('admin.users.relationships.lecturerTimeTables', ['lessons' => $user->lecturerLessons])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
