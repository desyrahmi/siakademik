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
                <li class="active">List Mata Kuliah</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Mata Kuliah</h3>
                            <a class="btn btn-default pull-right" href="{{route('subject.add.index')}}"><i class="fa fa-plus"></i> Tambah Mata Kuliah</a>                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Mata Kuliah</th>
                                    <th class="text-center">SKS</th>
                                    <th colspan="3" class="text-center">Menu</th>
                                </tr>
                                </thead>
                                @foreach($subjects as $subject)
                                    <tbody>
                                    <tr>
                                        <td>{{$subject->code}}</td>
                                        <td>{{$subject->name}}</td>
                                        <td>{{$subject->credit}}</td>
                                        <td class="text-center">
                                            <a href="{{route('subject.edit.form', ['id' => $subject->id])}}" class="btn btn-default" style="margin-right: 10px"><i class="fa fa-edit"></i>&nbsp;Update</a>&nbsp;
                                            <a href="{{route('subject.delete', ['id' => $subject->id])}}" class="btn btn-danger"><i class="fa fa-trash-o"></i>&nbsp;Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="text-center">{!!$subjects->render()!!}</div>
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
