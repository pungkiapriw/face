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
          <h3 class="card-title">Data Mahasiswa</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Data training</th>
                <th colspan="2">Tools</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nim}}</td>
                <td>{{$item->nama}}</td>
                <td> {{$item->email}}</td>
                <td>{{$item->foto}}</td>
                <td><a href="{{ url('mahasiswa/'.$item->id.'/edit', []) }}"><i style="color:orange;"
                      class="fas fa-edit"></i></a></td>
                <td><a onclick="return confirm('Apakah anda yakin ingin menghapus nya?')" href="{{ url('mahasiswa', [$item->id]) }}"><i style="color:#f2180d;"
                      class="fas fa-trash-alt"></i></a></td>
              </tr>
              @endforeach
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
  @endsection