<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{asset('assets/src/img/mucg.png')}}" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery-toast-plugin/dist/jquery.toast.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datedropper/datedropper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/ionicons/dist/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/icon-kit/dist/css/iconkit.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dist/css/theme.min.css')}}">
    <script src="{{asset('assets/src/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <style type="text/css">
        .nav-tabs .nav-link, .nav-tabs .nav-link :last-child {
            border-bottom-left-radius: 0px;
            border-color: transparent #dee2e6 transparent transparent;
        }

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
            border-color: #dee2e6 #fff #dee2e6 #dee2e6;
        }

        /*.tab-content {
            border: 1px solid;
            border-color: #dee2e6 #dee2e6 #dee2e6 transparent !important;
        }*/

        .nav-tabs .nav-link {
            border-bottom-left-radius: .25rem;
            border-top-right-radius: 0rem;
        }

        .nav-tabs .nav-link:hover {
            border-color: #dee2e6 #fff #dee2e6 #dee2e6;
        }

        .nav-tabs .nav-link:hover {
            border-color: #dee2e6 #fff #dee2e6 #dee2e6;
        }


        /*********************************************************
        *
        *   Flip Cards
        *
        *********************************************************/

        #team {
            background: #eee !important;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #108d6f;
            border-color: #108d6f;
            box-shadow: none;
            outline: none;
        }

        .btn-primary {
            color: #fff;
            background-color: #007b5e;
            border-color: #007b5e;
        }

        section {
            padding: 60px 0;
        }

        section .section-title {
            text-align: center;
            color: #007b5e;
            margin-bottom: 50px;
            text-transform: uppercase;
        }

        #team .card {
            border: none;
            background: #ffffff;
        }

        .image-flip:hover .backside,
        .image-flip.hover .backside {
            -webkit-transform: rotateY(0deg);
            -moz-transform: rotateY(0deg);
            -o-transform: rotateY(0deg);
            -ms-transform: rotateY(0deg);
            transform: rotateY(0deg);
            border-radius: .25rem;
        }

        .image-flip:hover .frontside,
        .image-flip.hover .frontside {
            -webkit-transform: rotateY(180deg);
            -moz-transform: rotateY(180deg);
            -o-transform: rotateY(180deg);
            transform: rotateY(180deg);
        }

        .mainflip {
            -webkit-transition: 1s;
            -webkit-transform-style: preserve-3d;
            -ms-transition: 1s;
            -moz-transition: 1s;
            -moz-transform: perspective(1000px);
            -moz-transform-style: preserve-3d;
            -ms-transform-style: preserve-3d;
            transition: 1s;
            transform-style: preserve-3d;
            position: relative;
        }

        .frontside {
            position: relative;
            -webkit-transform: rotateY(0deg);
            -ms-transform: rotateY(0deg);
            z-index: 2;
            margin-bottom: 30px;
        }

        .backside {
            position: absolute;
            top: 0;
            left: 0;
            background: white;
            -webkit-transform: rotateY(-180deg);
            -moz-transform: rotateY(-180deg);
            -o-transform: rotateY(-180deg);
            -ms-transform: rotateY(-180deg);
            transform: rotateY(-180deg);
            -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
            -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
            box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
        }

        .frontside,
        .backside {
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -ms-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transition: 1s;
            -webkit-transform-style: preserve-3d;
            -moz-transition: 1s;
            -moz-transform-style: preserve-3d;
            -o-transition: 1s;
            -o-transform-style: preserve-3d;
            -ms-transition: 1s;
            -ms-transform-style: preserve-3d;
            transition: 1s;
            transform-style: preserve-3d;
        }

        .frontside .card,
        .backside .card {
            min-height: 312px;
        }

        .backside .card a {
            font-size: 18px;
            color: #007b5e !important;
        }

        .frontside .card .card-title,
        .backside .card .card-title {
            color: #007b5e !important;
        }

        .frontside .card .card-body img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }

        /********** end Flip Cards **************************************/


        .national-user-header {
            background-color: #3c6e42 !important;
        }

        .national-user-header-brand {
            color: #ffffff !important;
        }

        .national-user-content {
            background-color: #404E67 !important;
        }

        .regional-user-header {
            background-color: #806645 !important;
        }

        .district-user-header {
            background-color: #cfb836 !important;
        }

        .district-user-content {
            background-color: #cfb836 !important;
        }

        .support-user-header {
            background-color: #ffffff !important;
        }

        .support-user-header-brand {
            color: #000 !important;
        }

        .totals_tab_holder {
            border: none;
        }

        .totals_tab_holder li a{
            margin: 0px;
            padding: 7px 12px;
            border-radius: 3px;
            background-color: #eeeeee;
            cursor: pointer;
        }

        .totals_tab_holder li a.active {
            background-color: #bebebe;
        }
    </style>

    @yield('styles')
</head>
