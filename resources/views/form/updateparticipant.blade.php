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
                <li><a href="{{route('index.participant', ['id' => $participant->room->id])}}"> List Peserta</a></li>
                <li class="active">Update Nilai</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-8 col-xs-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Nilai Mahasiswa</h3>
                        </div>
                        <form role="form" action="{{route('participant.update', ['id' => $participant->id])}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>NRP</label>
                                    <input type="text" class="form-control" value="{{$participant->student->username}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text"class="form-control" value="{{$participant->student->name}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>UTS</label>
                                    <input type="text" name="mid_exam_result" class="form-control" value="{{$participant->mid_exam_result}}">
                                </div>
                                <div class="form-group">
                                    <label>UAS</label>
                                    <input type="text" name="final_exam_result" class="form-control" value="{{$participant->final_exam_result}}">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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