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
                <li class="active">Update Data User</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-8 col-xs-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Data User</h3>
                        </div>
                        <form role="form" action="{{route('user.update', ['username' => $user->username])}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    @if($user->role=='dosen')
                                        <label>NIP</label>
                                    @elseif($user->role=='mahasiswa')
                                        <label>NRP</label>
                                    @endif
                                    <input type="text" name="username" class="form-control" value="{{$user->username}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                </div>
                                @if($user->role=='dosen')
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" class="form-control">
                                            <option value="dosen">Dosen</option>
                                            <option value="mahasiswa">Mahasiswa</option>
                                        </select>
                                    </div>
                                @endif
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
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="" class="btn btn-primary">Ganti Password</a>
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