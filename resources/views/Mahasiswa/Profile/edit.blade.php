@extends('layouts.main-toon')

@section('container') 


<div class="page-inner">

</div>
<!---->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Beranda</a>
    </li>
    <li class="breadcrumb-item active">{{$title}}</li>
</ol>
<div class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit profil: <i>{{ $mahasiswa->nama }}</i></h1>
  </div>
  
  <div class="col-lg-12">
    
    <form method="post" action="/mahasiswa/profile/{{$mahasiswa->id}}" enctype="multipart/form-data" class="row g-3">
      @method('put')
      @csrf
      <div class="mb-2 col-md-6">
        <label for="nim" class="form-label"><b>Nomor Induk Mahasiswa</b></label>
        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" required value="{{ $mahasiswa->nim }}" readonly>
        @error('nim')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-6">
        <label for="nama" class="form-label"><b>Nama Mahasiswa</b></label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ $mahasiswa->nama }}">
        @error('nama')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-6">
        <label for="tanggal_lahir" class="form-label"><b>Tanggal Lahir</b></label>
        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ $mahasiswa->tanggal_lahir }}">
        @error('tanggal_lahir')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-6">
        <label for="email" class="form-label"><b>Email</b></label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ $mahasiswa->email }}">
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-6">
        <label for="alamat" class="form-label"><b>Alamat Mahasiswa</b></label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $mahasiswa->alamat }}">
        @error('alamat')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-6">
        <label for="no_telp" class="form-label"><b><b>No Telepon Mahasiswa</b></b></label>
        <div class="input-group mb-2">
          <span class="input-group-text" id="basic-addon1">62</span>
          <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ $mahasiswa->no_telp }}" placeholder="81234567890">
          @error('no_telp')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-2">
        <label for="image" class="form-label"><b><b>Foto Mahasiswa</b></b></label>
        <input type="hidden" name="oldimage" id="oldimage" value="{{ $mahasiswa->image }}">
        @if($mahasiswa->image)
        <img src="{{ asset('storage/'.$mahasiswa->image) }}" class="img-preview img-fluid mb-2 col-md-6 d-block">
        @else
        <img class="img-preview img-fluid mb-2 col-md-6">
        @endif
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div>
        <button type="submit" class="btn text-white mb-3" style="background-color: #07be94;">Ubah Mahasiswa</button>
      </div>
    </form>
  
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
  </div>
</div>

@endsection