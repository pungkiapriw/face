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
                    <form name="myForm" action="{{ url('mahasiswa', []) }}" enctype="multipart/form-data" method="POST" onsubmit="return validateForm()">
                        @csrf
                        <input type="number" class="form-control" required="required" placeholder="Masukan Nim" id="nim"  name="nim">
                        <hr>
                        <input type="text" class="form-control"  required="required" placeholder="Masukan Nama" id="nama"  name="nama">
                        <hr>
                        <input type="email" class="form-control"  required="required" placeholder="Masukan Email" id="email"  name="email">
                        <hr>
                        <label for="fileToUpload">Masukan Foto Untuk Di Training</label>
                        <input type="file" required="required" name="foto" class="form-control">
                        <hr>
                        <input type="submit"  value="Enrol" class="btn btn-success" style="width: 35%">
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
<script>
function validateEmail(email) 
    {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
function validateNama(nama) 
{
	var re = /^[a-zA-Z\s]*$/;
	return re.test(nama);
}
function validateNumber(nomor) 
{
	var re = /^\\d+$/;
	return re.test(nomor);
}

function validateForm() {
	  var number = document.forms["myForm"]["nim"].value;
	  var nama = document.forms["myForm"]["nama"].value;
	  var email = document.forms["myForm"]["email"].value;
	  if (!validateEmail(email)) {
		alert("Tolong Masukan Email Yang Valid");
		return false;
	  }
	  else if(!validateNama(nama)){
		  alert("Tolong Masukan Nama Yang Valid");
		return false;
	  }
	  else if(validateNumber(number)){
		  alert("Tolong Masukan Nim Yang Valid");
		return false;
	  }
	}
</script>
    @endsection