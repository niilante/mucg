@extends('layouts.admin')
@section('title', __('Show Lecture Hall'))
@section('content')

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-layers bg-blue"></i>
                            <div class="d-inline">
                                <h5>{{ trans('cruds.lectureHall.title_singular') }}</h5>
                            <span>{{$lectureHall->name }} details</span>
                            </div>
                        </div>
                    </div>
                    @can('lesson_edit')
                        <div class="col-lg-4">
                            <nav class="breadcrumb-container" aria-label="breadcrumb">
                                <div>
                                    <a href="{{route('admin.lecture-halls.edit', $lectureHall)}}" class="btn btn-outline-secondary">
                                        <i class="ik ik-edit-2"></i>
                                        {{ trans('global.edit') }} {{ trans('cruds.lectureHall.title_singular') }}
                                    </a>
                                    <a href="{{route('admin.lecture-halls.index')}}" class="btn btn-outline-info">
                                        <i class="ik ik-list"></i>
                                        {{ trans('global.view') }} Lecture Halls
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
                                                {{ trans('cruds.lectureHall.fields.name') }}
                                            </th>
                                            <td>
                                                {{ $lectureHall->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.lectureHall.fields.code') }}
                                            </th>
                                            <td>
                                                {{ $lectureHall->code }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.lectureHall.fields.description') }}
                                            </th>
                                            <td>
                                                {{ $lectureHall->description ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.lectureHall.fields.capacity') }}
                                            </th>
                                            <td>
                                                {{ $lectureHall->capacity }}
                                            </td>
                                        </tr>
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
