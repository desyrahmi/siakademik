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
            {{--<div class="row">--}}
            {{--<section class="col-lg-11 connectedSortable">--}}
            {{--<div class="box box-primary">--}}
            {{--<div class="box-header">--}}
            {{--<i class="fa fa-user"></i>--}}
            {{--<h3 class="box-title">To Do List</h3>--}}
            {{--<div class="box-tools pull-right">--}}
            {{--<ul class="pagination pagination-sm inline">--}}
            {{--<li><a href="#">&laquo;</a></li>--}}
            {{--<li><a href="#">1</a></li>--}}
            {{--<li><a href="#">2</a></li>--}}
            {{--<li><a href="#">3</a></li>--}}
            {{--<li><a href="#">&raquo;</a></li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="box-body">--}}
            {{--<ul class="todo-list">--}}
            {{--<li>--}}
            {{--<!-- drag handle -->--}}
            {{--<span class="handle">--}}
            {{--<i class="fa fa-ellipsis-v"></i>--}}
            {{--<i class="fa fa-ellipsis-v"></i>--}}
            {{--</span>--}}
            {{--<input type="checkbox" value="">--}}
            {{--<span class="text">Design a nice theme</span>--}}
            {{--<small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>--}}
            {{--<div class="tools">--}}
            {{--<i class="fa fa-edit"></i>--}}
            {{--<i class="fa fa-trash-o"></i>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<span class="handle">--}}
            {{--<i class="fa fa-ellipsis-v"></i>--}}
            {{--<i class="fa fa-ellipsis-v"></i>--}}
            {{--</span>--}}
            {{--<input type="checkbox" value="">--}}
            {{--<span class="text">Make the theme responsive</span>--}}
            {{--<small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>--}}
            {{--<div class="tools">--}}
            {{--<i class="fa fa-edit"></i>--}}
            {{--<i class="fa fa-trash-o"></i>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<span class="handle">--}}
            {{--<i class="fa fa-ellipsis-v"></i>--}}
            {{--<i class="fa fa-ellipsis-v"></i>--}}
            {{--</span>--}}
            {{--<input type="checkbox" value="">--}}
            {{--<span class="text">Let theme shine like a star</span>--}}
            {{--<small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>--}}
            {{--<div class="tools">--}}
            {{--<i class="fa fa-edit"></i>--}}
            {{--<i class="fa fa-trash-o"></i>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<span class="handle">--}}
            {{--<i class="fa fa-ellipsis-v"></i>--}}
            {{--<i class="fa fa-ellipsis-v"></i>--}}
            {{--</span>--}}
            {{--<input type="checkbox" value="">--}}
            {{--<span class="text">Let theme shine like a star</span>--}}
            {{--<small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>--}}
            {{--<div class="tools">--}}
            {{--<i class="fa fa-edit"></i>--}}
            {{--<i class="fa fa-trash-o"></i>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<span class="handle">--}}
            {{--<i class="fa fa-ellipsis-v"></i>--}}
            {{--<i class="fa fa-ellipsis-v"></i>--}}
            {{--</span>--}}
            {{--<input type="checkbox" value="">--}}
            {{--<span class="text">Check your messages and notifications</span>--}}
            {{--<small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>--}}
            {{--<div class="tools">--}}
            {{--<i class="fa fa-edit"></i>--}}
            {{--<i class="fa fa-trash-o"></i>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<span class="handle">--}}
            {{--<i class="fa fa-ellipsis-v"></i>--}}
            {{--<i class="fa fa-ellipsis-v"></i>--}}
            {{--</span>--}}
            {{--<input type="checkbox" value="">--}}
            {{--<span class="text">Let theme shine like a star</span>--}}
            {{--<small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>--}}
            {{--<div class="tools">--}}
            {{--<i class="fa fa-edit"></i>--}}
            {{--<i class="fa fa-trash-o"></i>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="box-footer clearfix no-border">--}}
            {{--<button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</section>--}}
            {{--</div>--}}
        </section>
    </div>
@endsection

@section('footer')
    @include('base.footer')
@endsection
