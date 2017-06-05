@extends('base.base')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                @if(Auth::user()->role=='dosen')
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h1>Dosen</h1>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <a href="{{route('index.dosen')}}" class="small-box-footer">Data Dosen&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h1>Mahasiswa</h1>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <a href="{{route('index.mahasiswa')}}" class="small-box-footer">Data Mahasiswa <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-fuchsia">
                            <div class="inner">
                                <h1>Kelas</h1>
                            </div>
                            <div class="icon">
                                <i class="fa fa-institution"></i>
                            </div>
                            <a href="{{route('index.room')}}" class="small-box-footer">List Kelas <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h1>Mata Kuliah</h1>
                            </div>
                            <div class="icon">
                                <i class="fa fa-files-o"></i>
                            </div>
                            <a href="{{route('index.subject')}}" class="small-box-footer">Daftar Mata Kuliah <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @elseif(Auth::user()->role=='mahasiswa')
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-gray">
                            <div class="inner">
                                <h1>Ambil Kelas</h1>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <a href="{{route('participant.add.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="row">
                <section class="col-lg-6 connectedSortable">
                    <div class="box box-primary">
                        <div class="box-header">
                            <i class="fa fa-file-o"></i>
                            @if(Auth::user()->role == 'mahasiswa')
                                <h3 class="box-title">Profil Mahasiswa</h3>
                            @elseif(Auth::user()->role == 'dosen')
                                <h3 class="box-title">Profil Dosen</h3>
                            @endif
                        </div>
                        <div class="box-body">
                            <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
                            <ul class="list-group list-group-unbordered">
                                @if(Auth::user()->role == 'mahasiswa')
                                    <li class="list-group-item">
                                        <b>NRP</b> <p class="pull-right">{{Auth::user()->username}}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Dosen Wali</b> <p class="pull-right">{{Auth::user()->parent->name}}</p>
                                    </li>
                                @elseif(Auth::user()->role == 'dosen')
                                    <li class="list-group-item">
                                        <b>NIP</b> <p class="pull-right">{{Auth::user()->username}}</p>
                                    </li>
                                @endif
                            </ul>
                            <a href="{{route('profile.edit.form', ['username' => Auth::user()->username])}}" class="btn btn-primary"><b>Update Profile</b></a>
                        </div>
                    </div>
                </section>
                @if(Auth::user()->role == 'mahasiswa')
                    <section class="col-lg-6 connectedSortable">
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-file-o"></i>
                                <h3 class="box-title">List Mata Kuliah</h3>
                            </div>
                            <div class="box-body">
                                <ul class="todo-list">
                                    @foreach($participants as $participant)
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                                <span class="text">{{$participant->room->subject->name}}&nbsp;{{$participant->room->code}}&nbsp;&nbsp;&nbsp;{{$participant->room->lecturer->name}}</span>
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </section>
                @endif
                @if(Auth::user()->role == 'dosen')
                    <section class="col-lg-6 connectedSortable">
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-file-o"></i>
                                <h3 class="box-title">List Mata Kuliah</h3>
                            </div>
                            <div class="box-body">
                                <ul class="todo-list">
                                    @foreach($classes as $class)
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <span class="text">{{$class->subject->name}}&nbsp;{{$class->code}}</span>
                                            <div class="tools">
                                                <a href="{{route('index.participant', ['id' => $class->id])}}"><i class="fa fa-edit"></i></a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </section>
                    <section class="col-lg-6 connectedSortable">
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="fa fa-file-o"></i>
                                <h3 class="box-title">List Anak Wali</h3>
                            </div>
                            <div class="box-body">
                                <ul class="todo-list">
                                    @foreach($guards as $guard)
                                        <li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <span class="text">{{$guard->username}}&nbsp;{{$guard->name}}</span>
                                            <div class="tools">
                                                <a href="{{route('detail.wali', ['id' => $guard->id])}}"><i class="fa fa-edit"></i></a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </section>
                @endif
            </div>
        </section>
    </div>
@endsection

@section('footer')
    @include('base.footer')
@endsection
