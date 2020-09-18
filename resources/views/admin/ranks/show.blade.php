@extends('layouts.admin')
@section('content')

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-layers bg-blue"></i>
                            <div class="d-inline">
                                <h5>{{ trans('cruds.rank.title_singular') }}</h5>
                            <span>{{$rank->name ?? ''}} details</span>
                            </div>
                        </div>
                    </div>
                    @can('rank_edit')
                        <div class="col-lg-4">
                            <nav class="breadcrumb-container" aria-label="breadcrumb">
                                <div>
                                    <a href="{{route('admin.ranks.edit', ['rank' => $rank])}}" class="btn btn-outline-secondary">
                                        <i class="ik ik-edit-2"></i>
                                        {{ trans('global.edit') }} {{ trans('cruds.rank.title_singular') }}
                                    </a>
                                    <a href="{{route('admin.ranks.index')}}" class="btn btn-outline-info">
                                        <i class="ik ik-list"></i>
                                        {{ trans('global.view') }} ranks
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
                                                {{ trans('cruds.rank.fields.name') }}
                                            </th>
                                            <td>
                                                {{ $rank->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.rank.fields.code') }}
                                            </th>
                                            <td>
                                                {{ $rank->code ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.rank.fields.credit_hours') }} ( {{ trans('cruds.rank.fields.hours') }} )
                                            </th>
                                            <td>
                                                {{ $rank->credit_hours ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                {{ trans('cruds.rank.fields.description') }}
                                            </th>
                                            <td>
                                                {{ $rank->description ?? '' }}
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
