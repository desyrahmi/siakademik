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
                    <li class="active">Update Data Dosen</li>
                @elseif($user->role == 'mahasiswa')
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
                        <form role="form" action="{{route('password.update', ['username' => $user->username])}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password Baru">
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="retypepassword" class="form-control" placeholder="Konfirmasi Password">
                                </div>
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input type="password" name="oldpassword" class="form-control" placeholder="Password Lama">
                                </div>
                            </div>
                            <div class="box-footer">
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