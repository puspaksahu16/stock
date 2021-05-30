<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Puspak Sahu">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admn/assets/dist/img/favicon.png') }}">
    <!--Global Styles(used by all pages)-->
    <link href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/metisMenu/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/typicons/src/typicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/themify-icons/themify-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/summernote/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <!--Third party Styles(used by this page)-->
    <link href="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <!--Start Your Custom Style Now-->
    <link href="{{ asset('admin/assets/dist/css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        .paginate_button{
            padding: 10px !important;
            border: 2px solid !important;
            color: #fff;
        }
        .current{
            padding: 10px !important;
            border: 2px solid #37a000 !important;
            background-color: #37a000;
            color: #fff;
        }
        .previous{
            padding: 10px !important;
            border: 2px solid #0056b3 !important;
            color: #0056b3;
            margin: 5px;
        }
        .next{
            padding: 10px !important;
            border: 2px solid #0056b3 !important;
            color: #0056b3;
            margin: 5px;
        }
    </style>
</head>
<body class="fixed">
<!-- Page Loader -->
{{--<div class="page-loader-wrapper">--}}
    {{--<div class="loader">--}}
        {{--<div class="preloader">--}}
            {{--<div class="spinner-layer pl-green">--}}
                {{--<div class="circle-clipper left">--}}
                    {{--<div class="circle"></div>--}}
                {{--</div>--}}
                {{--<div class="circle-clipper right">--}}
                    {{--<div class="circle"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<p>Please wait...</p>--}}
    {{--</div>--}}
{{--</div>--}}
<!-- #END# Page Loader -->
<div class="wrapper">
    <!-- Sidebar  -->
@include('common.admin.sidebar')
<!-- Page Content  -->
    <div class="content-wrapper">
        <div class="main-content">
        @include('common.admin.navbar')
        <!--Content Header (Page header)-->
            @yield('content')
        </div><!--/.main content-->
        <footer class="footer-content">
            <div class="footer-text d-flex align-items-center justify-content-between">
                <div class="copy">© 2020 The WEGA.</div>
                {{--<div class="copy">© 2020 Shree Ganesh Ent.</div>--}}
                <div class="credit">Designed by: <a href="http://thewega.com/">The Wega</a></div>
            </div>
        </footer><!--/.footer content-->
        <div class="overlay"></div>
    </div><!--/.wrapper-->
</div>
<!--Global script(used by all pages)-->
@stack('scripts')
<script data-cfasync="false" src="{{ asset('admin/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/jQuery/jquery-3.4.1.min.js')}}"></script>
<script src="{{ asset('admin/assets/dist/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
<!-- Third Party Scripts(used by this page)-->
<script src="{{ asset('admin/assets/plugins/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/datatables/dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!--Page Active Scripts(used by this page)-->
<script src="{{ asset('admin/assets/plugins/summernote/summernote.active.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/datatables/data-basic.active.js') }}"></script>
<!--Page Active Scripts(used by this page)-->

<!--Page Scripts(used by all page)-->
<script src="{{ asset('admin/assets/dist/js/sidebar.js') }}"></script>
</body>
</html>

















{{--<!DOCTYPE html>--}}
{{--<html lang="{{ app()->getLocale() }}">--}}
{{--<head>--}}
    {{--<meta charset="utf-8">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}

    {{--<!-- CSRF Token -->--}}
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

    {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}

    {{--<!-- Styles -->--}}
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--</head>--}}
{{--<body>--}}
    {{--<div id="app">--}}
        {{--<nav class="navbar navbar-default navbar-static-top">--}}
            {{--<div class="container">--}}
                {{--<div class="navbar-header">--}}

                    {{--<!-- Collapsed Hamburger -->--}}
                    {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">--}}
                        {{--<span class="sr-only">Toggle Navigation</span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                    {{--</button>--}}

                    {{--<!-- Branding Image -->--}}
                    {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                        {{--{{ config('app.name', 'Laravel') }}--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
                    {{--<!-- Left Side Of Navbar -->--}}
                    {{--<ul class="nav navbar-nav">--}}
                        {{--&nbsp;--}}
                    {{--</ul>--}}

                    {{--<!-- Right Side Of Navbar -->--}}
                    {{--<ul class="nav navbar-nav navbar-right">--}}
                        {{--<!-- Authentication Links -->--}}
                        {{--@if (Auth::guest())--}}
                            {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                            {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                        {{--@else--}}
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                {{--</a>--}}

                                {{--<ul class="dropdown-menu" role="menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ route('logout') }}"--}}
                                            {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                            {{--Logout--}}
                                        {{--</a>--}}

                                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                            {{--{{ csrf_field() }}--}}
                                        {{--</form>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</nav>--}}

        {{--@yield('content')--}}
    {{--</div>--}}

    {{--<!-- Scripts -->--}}
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
{{--</body>--}}
{{--</html>--}}
