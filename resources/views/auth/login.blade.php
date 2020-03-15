@extends('layouts.auth')

@section('content')
    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
        <div class="authentication-form mx-auto">
            <div class="logo-centered">
                <a href="{{ route('login') }}"><img src="{{asset('assets/src/img/mucg.png')}}" width="80px" alt="{{ config('app.name') }}"></a>
            </div>
            <h3 style="text-align: center !important">{{ trans('panel.site_title') }}</h3>

            @if(Session::has('message'))
            <p style="text-align: center !important" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>

            @else

            <p style="text-align: center !important">Happy to see you again!</p>

            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ trans('global.login_email') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <i class="ik ik-user"></i>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="{{ trans('global.login_password') }}">
                    <i class="ik ik-lock"></i>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col text-left">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remember" name="remember" value="option1">
                            <span class="custom-control-label">&nbsp;{{ trans('global.remember_me') }}</span>
                        </label>
                    </div>

                    <div class="col text-right text-center">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" style="color: #0023c8 !important;" href="{{ route('password.request') }}">
                                {{ trans('global.forgot_password') }}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="sign-btn text-center">
                    <div class="col-lg-8" style="margin:0 auto !important">
                        <button type="submit" style="background-color: #0023c8 !important; border: #0023c8 !important" class="btn btn-primary btn-block mr-2">{{ trans('global.login') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
