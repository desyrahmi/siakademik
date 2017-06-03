<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI Akademik - Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    @yield('moreStyles')
</head>
<body>
<div class="content">
    <div class="login">
        <div class="row">
            <div class="col-lg-2 col-xs-2"></div>
            <div class="col-lg-4 col-xs-6">
                <div class="container">
                    <h1 class="logo">SI AKADEMIK</h1>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <form action="{{route('auth.doLogin')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default">Login</button>
                </form>
            </div>
            <div class="col-lg-2 col-xs-2"></div>
        </div>
    </div>
</div>
<!-- jQuery 2.2.3 -->
<script src="{{URL::asset('js/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{URL::asset('js/jquery.slimscroll.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('js/app.min.js')}}"></script>
@yield('moreSripts')
</body>
</html>
