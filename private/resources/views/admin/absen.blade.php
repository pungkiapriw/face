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
                    <h3 class="card-title"> <b> Absensi Manual </b> </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('absen', []) }}" method="POST">
                        @csrf
                        <h3>Nama Mahasiswa</h3>
                        <select name="nama" class="form-control">
                            @foreach ($data as $item)
                            <option value="{{$item->nim}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                        <hr>
                        <h3>Status</h3>
                        <select name="status" id="status" class="form-control">
                            <option value="hadir">Hadir</option>
                            <option value="ijin">Ijin</option>
                            <option value="tanpa keterangan">Tanpa Keterangan</option>
                        </select>
                        <hr>
                        <input type="submit" value="absen" class="btn btn-success" style="width: 35%">
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    @endsection