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
                <li class="active">Tambah Kelas</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-8 col-xs-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tambah Kelas</h3>
                        </div>
                        <form role="form" action="{{route('room.register')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <input type="text" name="code" class="form-control" placeholder="A">
                                </div>
                                <div class="form-group">
                                    <label>Mata Kuliah</label>
                                    <select name="subject_id" class="form-control">
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Dosen Pengajar</label>
                                    <select name="lecturer_id" class="form-control">
                                        @foreach($lecturers as $lecturer)
                                            <option value="{{$lecturer->id}}">{{$lecturer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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