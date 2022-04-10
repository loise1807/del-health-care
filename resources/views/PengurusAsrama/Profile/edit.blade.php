@extends('layouts.main')

@section('container')
<div class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit profil: <i>{{ $pengurus->nama }}</i></h1>
  </div>
  
  <div class="col-lg-12">
    
    <form method="post" action="/petugas/profile/{{$pengurus->id}}" enctype="multipart/form-data" class="row g-3">
      @method('put')
      @csrf
      <div class="mb-2 col-md-6">
        <label for="no_pegawai" class="form-label"><b>Nomor Pegawai Pengurus</b></label>
        <input type="text" class="form-control @error('no_pegawai') is-invalid @enderror" id="no_pegawai" name="no_pegawai" required value="{{ $pengurus->no_pegawai }}" readonly>
        @error('no_pegawai')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-6">
        <label for="nama" class="form-label"><b>Nama Pengurus</b></label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ $pengurus->nama }}">
        @error('nama')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-6">
        <label for="jabatan" class="form-label"><b>Jabatan Pengurus</b></label>
        <select class="form-select" name="jabatan" id="jabatan">
          @if($pengurus->jabatan == 'Bapak Asrama')
          <option value="Bapak Asrama" selected>Bapak Asrama</option>
          <option value="Ibu Asrama">Ibu Asrama</option>
          <option value="Abang Asrama">Abang Asrama</option>
          <option value="Kakak Asrama">Kakak Asrama</option>
          @elseif($pengurus->jabatan == 'Ibu Asrama')
          <option value="Bapak Asrama">Bapak Asrama</option>
          <option value="Ibu Asrama" selected>Ibu Asrama</option>
          <option value="Abang Asrama">Abang Asrama</option>
          <option value="Kakak Asrama">Kakak Asrama</option>
          @elseif($pengurus->jabatan == 'Abang Asrama')
          <option value="Bapak Asrama">Bapak Asrama</option>
          <option value="Ibu Asrama">Ibu Asrama</option>
          <option value="Abang Asrama" selected>Abang Asrama</option>
          <option value="Kakak Asrama">Kakak Asrama</option>
          @elseif($pengurus->jabatan == 'Kakak Asrama')
          <option value="Bapak Asrama">Bapak Asrama</option>
          <option value="Ibu Asrama">Ibu Asrama</option>
          <option value="Abang Asrama">Abang Asrama</option>
          <option value="Kakak Asrama" selected>Kakak Asrama</option>
          @else
          <option value="" selected>Pilih</option>
          <option value="Bapak Asrama">Bapak Asrama</option>
          <option value="Ibu Asrama">Ibu Asrama</option>
          <option value="Abang Asrama">Abang Asrama</option>
          <option value="Kakak Asrama">Kakak Asrama</option>
          @endif
        </select>
        @error('jabatan')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-6">
        <label for="asrama_id" class="form-label"><b>Lokasi Asrama</b></label>
        <select class="form-select" name="asrama_id" id="asrama_id">
          @foreach ($asramas as $asrama)
          @if($asrama->id == $pengurus->asrama_id)
          <option value="{{ $asrama->id }}" selected>{{ $asrama->nama_asrama}}</option>
          @else
          <option value="{{ $asrama->id }}">{{ $asrama->nama_asrama}}</option>
          @endif
          @endforeach
        </select>
        @error('asrama_id')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-6">
        <label for="email" class="form-label"><b>Email</b></label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ $pengurus->email }}">
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-6">
        <label for="no_telp" class="form-label"><b><b>No Telepon</b></b></label>
        <div class="input-group mb-2">
          <span class="input-group-text" id="basic-addon1">62</span>
          <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ $pengurus->no_telp }}" placeholder="81234567890">
          @error('no_telp')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-2">
        <label for="image" class="form-label"><b><b>Foto Pengurus</b></b></label>
        <input type="hidden" name="oldimage" id="oldimage" value="{{ $pengurus->image }}">
        @if($pengurus->image)
        <img src="{{ asset('storage/'.$pengurus->image) }}" class="img-preview img-fluid mb-2 col-md-6 d-block">
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
        <button type="submit" class="btn btn-primary mb-3 mt-3">Ubah Pengurus</button>
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