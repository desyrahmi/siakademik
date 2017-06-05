<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/skins/_all-skins.min.css')}}">
    @yield('moreStyles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <a href="{{route('index')}}" class="logo">
            @if(Auth::user()->role=='dosen')
                <span class="logo-mini"><b>A</b>LT</span>
                <span class="logo-lg"><b>Admin</b>LTE</span>
            @elseif(Auth::user()->role=='mahasiswa')
                <span class="logo-mini"><b>SI</b>A</span>
                <span class="logo-lg"><b>SI</b>AKADEMIK</span>
            @endif
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">{{Auth::user()->username}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <p>
                                    {{Auth::user()->name}}
                                </p>
                            </li>
                            <li class="user-body">
                            </li>
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                </div>
                <br><br>
            </div>
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                @if(Auth::user()->role=='mahasiswa')
                    <li class="treeview">
                        <a href="{{route('index')}}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="{{route('index')}}"><i class="fa fa-angle-right"></i> Dashboard</a></li>
                        </ul>
                    </li>
                @elseif(Auth::user()->role=='dosen')
                    <li class="treeview">
                        <a href="{{route('index')}}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="{{route('index')}}"><i class="fa fa-angle-right"></i> Dashboard</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>User</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('user.add.index')}}"><i class="fa fa-angle-right"></i> Tambah User</a></li>
                            <li><a href="{{route('index.dosen')}}"><i class="fa fa-angle-right"></i> Dosen</a></li>
                            <li><a href="{{route('index.mahasiswa')}}"><i class="fa fa-angle-right"></i> Mahasiswa</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file-o"></i>
                            <span>Mata Kuliah</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('subject.add.index')}}"><i class="fa fa-angle-right"></i> Tambah Mata Kuliah</a></li>
                            <li><a href="{{route('index.subject')}}"><i class="fa fa-angle-right"></i> Mata Kuliah</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-institution"></i>
                            <span>Kelas</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('room.add.index')}}"><i class="fa fa-angle-right"></i> Tambah Kelas</a></li>
                            <li><a href="{{route('index.room')}}"><i class="fa fa-angle-right"></i> List Kelas</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </section>
    </aside>
    @yield('content')
    @yield('footer')
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