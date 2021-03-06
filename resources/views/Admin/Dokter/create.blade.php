@extends('Admin.main')

@section('container-admin')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 col-md-12 border-bottom">
  <h1 class="h2">Tambah Dokter</h1>
</div>

<div class="col-lg-10">
  
  <form method="post" action="/admin/dokters" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">
      <div class="mb-2 col-md-4">
        <label for="username" class="form-label"><b>Username</b></label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required value="{{ old('username') }}">
        @error('username')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-4">
        <label for="password" class="form-label"><b>Password</b></label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required value="{{ old('password') }}">
        @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-4">
        <label for="repassword" class="form-label"><b>Re-Password</b></label>
        <input type="password" class="form-control @error('repassword') is-invalid @enderror" id="repassword" name="repassword" required>
        @error('repassword')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>
    <div class="row g-2">
      <div class="mb-3 col-md-6">
        <label for="no_pegawai_dokter" class="form-label">Nomor Pegawai Dokter</label>
        <input type="text" class="form-control @error('no_pegawai_dokter') is-invalid @enderror" id="no_pegawai_dokter" name="no_pegawai_dokter" required onkeypress="return hanyaAngka(event)" value="{{ old('no_pegawai_dokter') }}">
        @error('no_pegawai_dokter')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="nama" class="form-label">Nama Dokter</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama') }}">
        @error('nama')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="email" class="form-label"><b>Email</b></label>
        <div class="input-group mb-2">
          <span class="input-group-text" id="basic-addon-email">@</span>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 col-md-6">
        <label for="no_telp" class="form-label"><b>No Telepon</b></label>
        <div class="input-group mb-2">
          <span class="input-group-text" id="basic-addon-no_telp">+62</span>
          <input type="no_telp" onkeypress="return hanyaAngka(event)" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp') }}">
          @error('no_telp')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 col-md-12">
        <label for="spesialis" class="form-label">Spesialis Dokter</label>
        <input type="text" class="form-control @error('spesialis') is-invalid @enderror" id="spesialis" name="spesialis" required value="{{ old('spesialis') }}">
        @error('spesialis')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-6">
        <label for="image" class="form-label "><b>Foto Dokter</b></label>
        <img class="img-preview img-fluid mb-2 col-md-6">
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary mb-3 mt-3">Tambah Dokter</button>
  </form>

</div>

<script>
  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
  
  function hanyaAngka(event) {
    var angka = (event.which) ? event.which : event.keyCode
    if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
    return false;
    return true;
  }
</script>

@endsection
