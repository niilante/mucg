@extends('layouts.admin')
@section('title', __('Calendar'))
@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-calendar bg-blue"></i>
                        <div class="d-inline">
                            <h5>Time table</h5>
                            <span>Scheduled Time Table For The Calendar Week</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Calendar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row" style="margin-bottom: 15px !important">
                            @foreach($study_modes as $study_mode)
                                <div class="col-lg-3 flex">
                                    <a href="#" class="btn btn-primary btn-block">{{ $study_mode->name }}</a>
                                </div>
                            @endforeach
                        </div>
                        <div class="clearfix"></div>
                        
                        <table class="table table-bordered">
                            <thead>
                                <th width="125">Time / Day</th>
                                @foreach($study_modes[0]->modeDays as $day)
                                    <th>{{ $day->name }}</th>
                                @endforeach
                            </thead>
                            <tbody>
                                @foreach($study_modes[0]->modeDays as $day)
                                    <tr>
                                        <td>
                                            {{ $day->id }}
                                        </td>
                                        {{-- @foreach($days as $value)
                                            
                                        @endforeach --}}
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
