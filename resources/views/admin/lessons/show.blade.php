@extends('layouts.admin')
@section('title', __('Show Lesson'))
@section('content')

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-layers bg-blue"></i>
                            <div class="d-inline">
                                <h5>{{ trans('cruds.lesson.title_singular') }}</h5>
                            <span>{{$lesson->class->name ?? ''}} details</span>
                            </div>
                        </div>
                    </div>
                    @can('lesson_edit')
                        <div class="col-lg-4">
                            <nav class="breadcrumb-container" aria-label="breadcrumb">
                                <div>
                                    <a href="{{route('admin.lessons.edit', $lesson->id)}}" class="btn btn-outline-secondary">
                                        <i class="ik ik-edit-2"></i>
                                        {{ trans('global.edit') }} {{ trans('cruds.lesson.title_singular') }}
                                    </a>
                                    <a href="{{route('admin.lessons.index')}}" class="btn btn-outline-info">
                                        <i class="ik ik-list"></i>
                                        {{ trans('global.view') }} Lessons
                                    </a>
                                </div>
                            </nav>
                        </div>
                    @endcan
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dt-responsive">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.lesson.fields.code') }}
                                            </th>
                                            <td>
                                                {{ $lesson->code }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.lesson.fields.title') }}
                                            </th>
                                            <td>
                                                {{ $lesson->title }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.lesson.fields.class') }}
                                            </th>
                                            <td>
                                                {{ $lesson->classMembers->name ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.lesson.fields.description') }}
                                            </th>
                                            <td>
                                                {{ $lesson->description ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.lesson.fields.department') }}
                                            </th>
                                            <td>
                                                {{ $lesson->department ? $lesson->department->name : '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.lesson.fields.lecturer') }}
                                            </th>
                                            <td>
                                                {{ $lesson->lecturer->fname ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.lesson.fields.study_mode') }}
                                            </th>
                                            <td>
                                                {{ $lesson->studyMode->name ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.lesson.fields.duration') }}
                                            </th>
                                            <td>
                                                {{ $lesson->duration }} minutes
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <th>
                                                {{ trans('cruds.lesson.fields.start_time') }}
                                            </th>
                                            <td>
                                                {{ date('h:i A', strtotime($lesson->start_time)) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.lesson.fields.end_time') }}
                                            </th>
                                            <td>
                                                {{ date('h:i A', strtotime($lesson->end_time))}}
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
