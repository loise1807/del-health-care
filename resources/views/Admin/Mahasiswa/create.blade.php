@extends('Admin.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Mahasiswa</h1>
</div>

<div class="col-lg-6">
  
  <form method="post" action="/admin/mahasiswas" enctype="multipart/form-data" class="row g-3">
    @csrf
    <div class="mb-2 col-md-6">
      <label for="nim" class="form-label"><b>Nomor Induk Mahasiswa</b></label>
      <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" required value="{{ old('nim') }}">
      @error('nim')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2 col-md-6">
      <label for="nama" class="form-label"><b>Nama Mahasiswa</b></label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama') }}">
      @error('nama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2 col-md-4">
      <label for="tanggal_lahir" class="form-label"><b>Tanggal Lahir</b></label>
      <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
      @error('tanggal_lahir')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2 col-md-5">
      <label for="prodi" class="form-label"><b>Program Studi</b></label>
      <select class="form-select" name="prodi" id="prodi">
            <option value="" selected>Pilih</option>
            <option value="D3 - Teknologi Komputer">D3 - Teknologi Komputer</option>
            <option value="D3 - Teknologi Informasi">D3 - Teknologi Informasi</option>
            <option value="S1 - Sistim Informasi">S1 - Sistim Informasi</option>
            <option value="S1 - Informatika">S1 - Informatika</option>
            <option value="S1 - Teknik Elektro">S1 - Teknik Elektro</option>
            <option value="S1 - Manajemen Rekayasa">S1 - Manajemen Rekayasa</option>
            <option value="S1 - Bioproses">S1 - Bioproses</option>
      </select>
      @error('prodi')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2 col-md-3">
      <label for="angkatan" class="form-label"><b>Angkatan</b></label>
      <input type="number" class="form-control @error('angkatan') is-invalid @enderror" id="angkatan" name="angkatan" required value="{{ old('angkatan') }}">
      @error('angkatan')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2 col-md-6">
      <label for="asrama" class="form-label"><b>Asrama </b></label>
      <select class="form-select" name="asrama_id" id="asrama_id">
        @foreach($asramas as $asrama)
            <option value="{{ $asrama->id }}" selected>{{ $asrama->nama_asrama }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-2 col-md-6">
      <label for="email" class="form-label"><b>Email</b></label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2 col-md-6">
      <label for="alamat" class="form-label"><b>Alamat Mahasiswa</b></label>
      <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}">
      @error('alamat')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2 col-md-6">
      <label for="no_telp" class="form-label"><b>No Telepon Mahasiswa</b></label>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">62</span>
        <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" placeholder="81234567890">
        @error('no_telp')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>
    <div class="mb-2">
      <label for="image" class="form-label "><b>Foto Mahasiswa</b></label>
      <img class="img-preview img-fluid mb-2 col-md-6">
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary mb-2 mt-3 col-md-6">Tambah Mahasiswa</button>
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
</script>

@endsection
