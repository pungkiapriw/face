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
          <h3 class="card-title">Data Absen Mahasiswa Tanggal,  {{date_format(now(),"d M Y")}}</h3>
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
                <th colspan="2">Tools</th>
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
                <td><a href="{{ url('absensi/'.$item->id.'/edit', []) }}"><i style="color:orange;"
                      class="fas fa-edit"></i></a></td>
                <td><a onclick="return confirm('Apakah anda yakin ingin menghapus nya?')" href="{{ url('absensi', [$item->id]) }}"><i style="color:#f2180d;"
                      class="fas fa-trash-alt"></i></a></td>
              </tr>
              @php($i+=1)
              @endforeach
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
  @endsection