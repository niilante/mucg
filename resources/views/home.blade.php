@extends('layouts.admin_app')
@section('title', __('Dashboard'))
@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-grid bg-blue"></i>
                        <div class="d-inline">
                            <h5>Dashboard</h5>
                            <span>{{ Auth::user()->role_name}} Dashboard</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route("admin.home") }}"><i class="ik ik-grid"></i></a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Total No. of Users</h6>

                                @if( $user_counts > 0)
                                    <h2>{{ $user_counts }}</h2>
                                @else
                                @endif

                            </div>
                            <div class="icon">
                                <i class="ik ik-users"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">6% higher than previous total</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Total No. of Lecture Classes</h6>
                                @if( $user_counts > 0)
                                    <h2>{{ $lecture_class_counts }}</h2>
                                @else

                                @endif
                            </div>
                            <div class="icon">
                                <i class="ik ik-bar-chart-2"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">11 times monthly average</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Total No. of Lessons</h6>
                                @if( $user_counts > 0)
                                    <h2>{{ $lesson_counts }}</h2>
                                @else

                                @endif
                            </div>
                            <div class="icon">
                                <i class="ik ik-calendar"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">80% of monthly average</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h6>Total No. of Resources</h6>
                                <h2>153</h2>
                            </div>
                            <div class="icon">
                                <i class="ik ik-airplay"></i>
                            </div>
                        </div>
                        <small class="text-small mt-10 d-block">72% of monthly average</small>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Totals
                            <ul class="nav nav-tabs" style="float: right; margin-left: 20px;">
                              <li class="active" style="margin-left: 18px;"><a data-toggle="tab" class="active show" href="#tab-category">By Category</a></li>
                              <li style="margin-left: 18px;"><a data-toggle="tab" href="#tab-grade">By Grade</a></li>
                              <li style="margin-left: 18px;"><a data-toggle="tab" href="#tab-firm">By Firm</a></li>
                            </ul>
                        </h3>
                    </div>
                    <div class="card-block text-center">
                        <div class="card-body">
                            <div class="tab-content">
                              <div id="tab-category" class="tab-pane fade in active show">
                                <div class="col-lg-8" style="float: left;">
                                    <div id="3D_pie_chart1"  class="chart-shadow" style="height:400px"></div>
                                </div>
                                <div class="col-lg-4" style="float: right;">
                                    <div id="bar_chart1" class="chart-shadow" style="height:400px"></div>
                                </div>
                              </div>
                              <div id="tab-grade" class="tab-pane fade">
                                <div class="col-lg-8" style="float: left;">
                                    <div id="3D_pie_chart2"  class="chart-shadow" style="height:400px"></div>
                                </div>
                                <div class="col-lg-4" style="float: right;">
                                    <div id="bar_chart2" class="chart-shadow" style="height:400px"></div>
                                </div>
                              </div>
                              <div id="tab-firm" class="tab-pane fade">
                                <div class="col-lg-8" style="float: left;">
                                    <div id="3D_pie_chart3"  class="chart-shadow" style="height:400px"></div>
                                </div>
                                <div class="col-lg-4" style="float: right;">
                                    <div id="bar_chart3" class="chart-shadow" style="height:400px"></div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection


{{-- @extends('layouts.admin_app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection --}}
