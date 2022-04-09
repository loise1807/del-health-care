@extends('Admin.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Pengurus Asrama</h1>
</div>

<div class="col-lg-12">
  
  <form method="post" action="/admin/petugas_asramas" enctype="multipart/form-data">
    @csrf
    <div class="row g-2">
      <div class="mb-3 col-md-6">
        <label for="no_pegawai" class="form-label"><b>Nomor Pegawai Pengurus</b></label>
        <input type="number" class="form-control @error('no_pegawai') is-invalid @enderror" id="no_pegawai" name="no_pegawai" required value="{{ old('no_pegawai') }}">
        @error('no_pegawai')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="nama" class="form-label"><b>Nama Pengurus</b></label>
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
      <div class="mb-2 col-md-6">
        <label for="no_telp" class="form-label"><b>No Telepon</b></label>
        <div class="input-group mb-2">
          <span class="input-group-text" id="basic-addon-no">+62</span>
          <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" placeholder="81234567890">
          @error('no_telp')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 col-md-6">
        <label for="asrama" class="form-label"><b>Asrama</b></label>
        <select class="form-select" name="asrama_id" id="asrama_id">
          <option value="" selected>Pilih Asrama</option>
          @foreach($asramas as $asrama)
              <option value="{{ $asrama->id }}">{{ $asrama->nama_asrama }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3 col-md-6">
        <label for="jabatan" class="form-label"><b>Jabatan Pengurus</b></label>
        <select class="form-select" name="jabatan" id="jabatan">
              <option value="" selected>Pilih</option>
              <option value="Bapak Asrama">Bapak Asrama</option>
              <option value="Ibu Asrama">Ibu Asrama</option>
              <option value="Abang Asrama">Abang Asrama</option>
              <option value="Kakak Asrama">Kakak Asrama</option>
        </select>
        @error('jabatan')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-6">
        <label for="image" class="form-label "><b>Foto Pengurus</b></label>
        <img class="img-preview img-fluid mb-2 col-md-6">
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>
    <button type="submit" class="btn btn-primary mb-3 mt-3 col-md-2">Tambah Pengurus</button>
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
