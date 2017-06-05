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
                <li><a href="{{route('index.subject')}}"> List Mata Kuliah</a></li>
                <li class="active">Update Data Mata Kuliah</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-8 col-xs-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Data Mata Kuliah</h3>
                        </div>
                        <form role="form" action="{{route('subject.update', ['id' => $subject->id])}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Kode</label>
                                    <input type="text" name="code" class="form-control" value="{{$subject->code}}">
                                </div>
                                <div class="form-group">
                                    <label>Mata Kuliah</label>
                                    <input type="text" name="name" class="form-control" value="{{$subject->name}}">
                                </div>
                                <div class="form-group">
                                    <label>SKS</label>
                                    <input type="text" name="credit" class="form-control" value="{{$subject->credit}}">
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