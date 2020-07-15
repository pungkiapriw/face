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
                    <h3 class="card-title"> <b> Laporan Absensi </b> </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('laporan', []) }}" method="POST">
                        @csrf
                        <h3>Pilih dari tanggal :</h3>
                        <input type="date" name="fromtanggal" class="form-control">
                        <hr>
                        <h3>Sampai tanggal :</h3>
                        <input type="date" name="totanggal" class="form-control">
                        <hr>
                        <input type="submit" value="Lihat Absensi" class="btn btn-success" style="width: 35%">
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    @endsection