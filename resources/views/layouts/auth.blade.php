<!doctype html>
<html class="no-js" lang="en">
    @include('layouts.admin.head')
    <body>
        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('{{asset('assets/img/auth/bg.jpg')}}')">
                            <div class="lavalite-overlay"></div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
        @include('layouts.admin.scriptsjs')
    </body>
</html>
