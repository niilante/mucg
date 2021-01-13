<!doctype html>
<html class="no-js" lang="en">
    @include('layouts.admin.head')
    <body>
        <div class="wrapper">
            @include('layouts.admin.header')

            <div class="page-wrap">
                @include('layouts.admin.sidebar.'.auth()->user()->role_code)
                @yield('content')

                @include('layouts.admin.footer')
            </div>
        </div>

        <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="quick-search">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto">
                                    <div class="input-wrap">
                                        <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                        <i class="ik ik-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('layouts.admin.nav_modal')
                </div>
            </div>
        </div>
        @include('layouts.admin.scriptsjs')
    </body>
</html>
