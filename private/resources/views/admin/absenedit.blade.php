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
                    <h3 class="card-title"> <b> {{$data->nim}} </b> </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('absensi', [$data->id]) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <select name="status" id="status" class="form-control">
                            <option value="hadir" <?php if($data->status=="hadir") {echo "selected='selected'"; } ?>>Hadir</option>
                            <option value="ijin"  <?php if($data->status=="ijin") {echo "selected='selected'"; } ?>>Ijin</option>
                            <option value="tanpa keterangan"  <?php if($data->status=="tanpa keterangan") {echo "selected='selected'"; } ?>>Tanpa Keterangan</option>
                          </select>
                        <hr>
                        <input type="submit"  value="update" class="btn btn-success" style="width: 35%">
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    @endsection