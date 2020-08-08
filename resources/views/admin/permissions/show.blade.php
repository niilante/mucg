@extends('layouts.admin')
@section('content')

<div class="main-content">
    <div class="container-fluid">
            <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ trans('cruds.permission.title') }}</h5>
                            <span>Permission Details</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-right">
                    <div>
                        <a class="btn btn-outline-secondary" href="{{route('admin.permissions.edit', $permission->id)}}">
                            <i class="ik ik-edit-2"></i> 
                            {{ trans('global.edit') }} {{ trans('cruds.permission.title_singular') }}
                        </a>

                        <a class="btn btn-outline-info" href="{{ route('admin.permissions.index') }}">
                            <i class="ik ik-list"></i> {{ trans('global.view') }} Permissions
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="card-body"> 
                        <small class="text-muted d-block pt-10">{{ trans('cruds.permission.fields.id') }}</small>
                        <h5>{{ $permission->id }}</h5> 
                        <small class="text-muted d-block pt-10">{{ trans('cruds.permission.fields.title') }}</small>
                        <h5>{{ $permission->title }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="pills-timeline-tab" data-toggle="pill" href="#roles" role="tab" aria-controls="pills-timeline" aria-selected="true">{{ trans('cruds.role.title') }}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                        </li> --}}
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="roles" role="tabpanel" aria-labelledby="pills-timeline-tab">
                            <div class="card-body">
                                <div class="profiletimeline mt-0">
                                    <div class="card">
                                        {{-- @includeIf('admin.permissions.relationships.permissionsRoles', ['roles' => $permission->permissionsRoles]) --}}
                                        {{-- <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <th>
                                                        {{ trans('cruds.lesson.fields.id') }}
                                                    </th>
                                                    <td>
                                                        {{ $lesson->id }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection