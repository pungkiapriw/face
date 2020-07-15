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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Absen Mahasiswa Tanggal {{$from}} sampai Tanggal {{$to}} </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nim</th>
                                <th>Tanggal dan Jam</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$item->nim}}</td>
                                <td>{{date_format($item->created_at,"d M Y  |  H:m a")}}</td>
                                <td> {{$item->status}}</td>
                            </tr>
                            @php($i+=1)
                            @endforeach
                    </table>
                    <div>
                        <form action="{{ url('laporan', []) }}" method="post">
                            @csrf
                            <input type="hidden" name="export">
                            <input type="hidden" name="fromtanggal" value="{{$from}}">
                            <input type="hidden" name="totanggal" value="{{$to}}">
                            <input type="submit" value="Cetak Laporan" class="btn btn-success">
                        </form>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    @endsection