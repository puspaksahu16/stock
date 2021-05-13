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
    <!--Third party Styles(used by this page)-->

    <!--Start Your Custom Style Now-->
    <link href="{{ asset('admin/assets/dist/css/style.css') }}" rel="stylesheet">
    <!--Third party Styles(used by this page)-->

    <!--Start Your Custom Style Now-->
    <link href="{{ asset('admin/assets/dist/css/style.css') }}" rel="stylesheet">
</head>
<body class="bg-white">
<div class="d-flex align-items-center justify-content-center text-center h-100vh">
    <div class="form-wrapper m-auto">
        <div class="form-container my-4">
            <div class="register-logo text-center mb-4">
                <img src="assets/dist/img/logo2.html" alt="">
            </div>
            <div class="panel">
                <div class="panel-header text-center mb-3">
                    <h3 class="fs-24">Sign up for your account!</h3>
                </div>

                <form class="register-form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">

                    </div>

                    <button type="submit" class="btn btn-success btn-block">Register</button>
                </form>
            </div>
            <div class="bottom-text text-center my-3">
                Already have an account? <a href="{{ route('login') }}" class="font-weight-500">login</a>
            </div>
        </div>
    </div>
</div>
<!-- /.End of form wrapper -->
<!--Global script(used by all pages)-->
<script src="{{ asset('admin/assets/plugins/jQuery/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('admin/assets/dist/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>

</body>
</html>

