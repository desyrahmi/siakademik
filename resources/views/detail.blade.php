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
                <li><a href="{{route('index.wali', ['id' => Auth::User()->id])}}"> List Anak Wali</a></li>
                <li class="active">Data Mahasiswa</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-6 col-xs-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <i class="fa fa-file-o"></i>
                            <h3 class="box-title">Profil Mahasiswa</h3>
                        </div>
                        <div class="box-body">
                            <h3 class="profile-username text-left">{{$user->username}}</h3>
                            <h3 class="profile-username text-left">{{$user->name}}</h3>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>NRP</b> <p class="pull-right">NRP</p>
                                </li>
                                <li class="list-group-item">
                                    <b>Dosen Wali</b> <p class="pull-right">Nama Dosen</p>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-primary"><b>Update Profile</b></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xs-6">
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
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer')
    @include('base.footer')
@endsection