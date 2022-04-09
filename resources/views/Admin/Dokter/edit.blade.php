@extends('Admin.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Dokter</h1>
</div>

<div class="col-lg-12">
  
  <form method="POST" action="/admin/dokters/{{$dokter->no_pegawai_dokter}}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="row g-2">
      <div class="mb-3 col-md-6">
        <label for="no_pegawai_dokter" class="form-label">Nomor Pegawai Dokter</label>
        <input type="text" class="form-control @error('no_pegawai_dokter') is-invalid @enderror" id="no_pegawai_dokter" name="no_pegawai_dokter" required value="{{ $dokter->no_pegawai_dokter }}">
        @error('no_pegawai_dokter')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="nama" class="form-label">Nama Dokter</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ $dokter->nama }}">
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
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ $dokter->email }}">
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
          <input type="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ $dokter->no_telp }}">
          @error('no_telp')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 col-md-12">
        <label for="spesialis" class="form-label">Spesialis Dokter</label>
        <input type="text" class="form-control @error('spesialis') is-invalid @enderror" id="spesialis" name="spesialis" required value="{{ $dokter->spesialis }}">
        @error('spesialis')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2">
        <label for="image" class="form-label"><b><b>Foto Dokter</b></b></label>
        <input type="hidden" name="oldimage" id="oldimage" value="{{ $dokter->image }}">
        @if($dokter->image)
        <img src="{{ asset('storage/'.$dokter->image) }}" class="img-preview img-fluid mb-2 col-md-6 d-block">
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
    </div>
    <button type="submit" class="btn btn-primary mb-3 mt-3">Ubah Dokter</button>
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
