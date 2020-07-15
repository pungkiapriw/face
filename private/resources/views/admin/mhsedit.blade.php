@extends('template.admin')
@section('content')
<div class="container-fluid">

    <div class="row">
        @if($errors->any())
        <div class="container">
            <div style="background-color:rgb(34, 143, 59)" class="col-12">
                <h4 style="color:white">{{$errors->first()}}</h4>
            </div>
        </div>
        @endif
        <div class="col-7">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> <b> {{$data->nama}} </b> </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('mahasiswa', [$data->id]) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <input type="text" class="form-control" value="{{$data->nim}}" name="nim">
                        <hr>
                        <input type="text" class="form-control" value="{{$data->nama}}" name="nama">
                        <hr>
                        <input type="text" class="form-control" value="{{$data->email}}" name="email">
                        <hr>
                        <input type="submit"  value="update" class="btn btn-success" style="width: 35%">
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    @endsection