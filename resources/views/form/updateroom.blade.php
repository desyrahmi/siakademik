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
                <li><a href="{{route('index.room')}}"> List Kelas</a></li>
                <li class="active">Update Data Kelas</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-8 col-xs-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Data Kelas</h3>
                        </div>
                        <form role="form" action="{{route('room.update', ['id' => $room->id])}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Mata Kuliah</label>
                                    <input type="text" class="form-control" value="{{$room->subject->name}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <input type="text" name="code" class="form-control" value="{{$room->code}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>SKS</label>
                                    <input type="text" class="form-control" value="{{$room->subject->credit}}">
                                </div>
                                <div class="form-group">
                                    <label>Dosen</label>
                                    <select name="lecturer_id" class="form-control">
                                        <option value="{{$room->lecturer_id}}">{{$room->lecturer->name}}</option>
                                        @foreach($lecturers as $lecturer)
                                            @if($lecturer->id != $room->lecturer_id)
                                                <option value="{{$lecturer->id}}">{{$lecturer->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
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