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
                @if($user->role == 'dosen')
                    <li><a href="{{route('index.dosen')}}"> List Dosen</a></li>
                    <li class="active">Update Data Dosen</li>
                @elseif($user->role == 'mahasiswa')
                    <li><a href="{{route('index.mahasiswa')}}"> List Mahasiswa</a></li>
                    <li class="active">Update Data Mahasiswa</li>
                @endif
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-8 col-xs-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            @if($user->role == 'dosen')
                                <h3 class="box-title">Update Data Dosen</h3>
                            @elseif($user->role == 'mahasiswa')
                                <h3 class="box-title">Update Data Mahasiswa</h3>
                            @endif
                        </div>
                        <form role="form" action="{{route('user.update', ['username' => $user->username])}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    @if($user->role=='dosen')
                                        <label>NIP</label>
                                    @elseif($user->role == 'mahasiswa')
                                        <label>NRP</label>
                                    @endif
                                    <input type="text" name="username" class="form-control" value="{{$user->username}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password Baru">
                                </div>
                                @if($user->role == 'mahasiswa')
                                    <div class="form-group">
                                        <label>Dosen Wali</label>
                                        <select name="guardian_id" class="form-control">
                                            <option value="{{$user->guardian_id}}">{{$user->parent->name}}</option>
                                            @foreach($guardians as $guardian)
                                                @if($guardian->id != $user->parent->id)
                                                    <option value="{{$guardian->id}}">{{$guardian->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                {{--<a href="{{route('user.edit.password', ['username' => $user->password])}}" class="btn btn-primary">Ganti Password</a>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer')
    @include('base.footer')
@endsection