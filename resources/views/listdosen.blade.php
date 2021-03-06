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
                <li class="active">List Dosen</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Dosen</h3>
                            <a href="{{route('user.add.index')}}" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Tambah Data Dosen</a>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">NIP</th>
                                    <th class="text-center">Nama</th>
                                    <th colspan="3" class="text-center">Menu</th>
                                </tr>
                                </thead>
                                @foreach($lecturers as $lecturer)
                                <tbody>
                                <tr>
                                    <td>{{$lecturer->username}}</td>
                                    <td>{{$lecturer->name}}</td>
                                    <td class="text-center">
                                        <a href="{{route('index.wali', ['id' => $lecturer->id])}}" class="btn btn-info" style="margin-right: 10px">List Anak Wali</a>&nbsp;
                                        <a href="{{route('user.edit.form', ['username' => $lecturer->username])}}" class="btn btn-default" style="margin-right: 10px"><i class="fa fa-edit"></i>&nbsp;Update</a>&nbsp;
                                        <a href="{{route('user.delete', ['id' => $lecturer->id])}}" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp;Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="text-center">{!!$lecturers->render()!!}</div>
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
