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
                <li class="active">List Kelas</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Kelas</h3>
                            <a class="btn btn-default pull-right" href="{{route('room.add.index')}}"><i class="fa fa-plus"></i> Tambah Kelas</a>                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">Mata Kuliah</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">SKS</th>
                                    <th class="text-center">Dosen</th>
                                    <th colspan="3" class="text-center">Menu</th>
                                </tr>
                                </thead>
                                @foreach($rooms as $room)
                                    <tbody>
                                    <tr>
                                        <td>{{$room->subject->name}}</td>
                                        <td>{{$room->code}}</td>
                                        <td>{{$room->subject->credit}}</td>
                                        <td>{{$room->lecturer->name}}</td>
                                        <td class="text-center">
                                            <a href="{{route('index.participant', ['id' => $room->id])}}" class="btn btn-default" style="margin-right: 10px"><i class="fa fa-edit"></i>&nbsp;Daftar Peserta</a>&nbsp;
                                            <a href="{{route('room.edit.form', ['id' => $room->id])}}" class="btn btn-default" style="margin-right: 10px"><i class="fa fa-edit"></i>&nbsp;Update</a>&nbsp;
                                            <a href="{{route('room.delete', ['id' => $room->id])}}" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp;Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="text-center">{!!$rooms->render()!!}</div>
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
