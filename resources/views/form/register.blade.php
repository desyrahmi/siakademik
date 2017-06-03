@extends('base.base')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Register User</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-8 col-xs-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Register User</h3>
                        </div>
                        <form role="form" action="{{route('user.register')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>NIP/NRP</label>
                                    <input type="text" name="username" class="form-control" placeholder="511x100xxx">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Retype Password</label>
                                    <input type="password" name="retypepassword" class="form-control" placeholder="Retype-Password">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control">
                                        <option value="dosen">Dosen</option>
                                        <option value="mahasiswa">Mahasiswa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Dosen Wali</label>
                                    <select name="guardian_id" class="form-control">
                                        <option value="">Select Dosen</option>
                                        @foreach($guardians as $guardian)
                                            <option value="{{$guardian->id}}">{{$guardian->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Register</button>
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