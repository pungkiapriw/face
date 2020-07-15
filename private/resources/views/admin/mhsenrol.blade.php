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
                    <h3 class="card-title"> <b> Enrol Mahasiswa </b> </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('mahasiswa', []) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="number" class="form-control" placeholder="Masukan Nim" id="nim"  name="nim">
                        <hr>
                        <input type="text" class="form-control" placeholder="Masukan Nama" id="nama"  name="nama">
                        <hr>
                        <input type="email" class="form-control" placeholder="Masukan Email" id="email"  name="email">
                        <hr>
                        <label for="fileToUpload">Masukan Foto Untuk Di Training</label>
                        <input type="file" name="foto" class="form-control">
                        <hr>
                        <input type="submit"  value="Enrol" class="btn btn-success" style="width: 35%">
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    @endsection