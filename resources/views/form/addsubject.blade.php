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
                <li class="active">Tambah Matakuliah</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-8 col-xs-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tambah Matakuliah</h3>
                        </div>
                        <form role="form" action="{{route('subject.register')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Kode Mata Kuliah</label>
                                    <input type="text" name="code" class="form-control" placeholder="IG091301">
                                </div>
                                <div class="form-group">
                                    <label>Nama Mata Kuliah</label>
                                    <input type="text" name="name" class="form-control" placeholder="Agama Islam">
                                </div>
                                <div class="form-group">
                                    <label>SKS</label>
                                    <input type="text" name="credit" class="form-control" placeholder="2">
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