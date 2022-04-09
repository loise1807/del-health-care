@extends('Admin.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Asrama</h1>
</div>

<div class="col-lg-6">
  
  <form method="post" action="/admin/asramas">
    @csrf
    <div class="mb-3">
      <label for="nama_asrama" class="form-label">Nama Asrama </label>
      <input type="text" class="form-control @error('nama_asrama') is-invalid @enderror" id="nama_asrama" name="nama_asrama" required autofocus value="{{ old('nama_asrama') }}">
      @error('nama_asrama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="jenis_asrama" class="form-label">Jenis Asrama</label>
      <select class="form-select" name="jenis_asrama" id="jenis_asrama">
            <option value="Asrama Putra" selected>Asrama Putra</option>
            <option value="Asrama Putri">Asrama Putri</option>
      </select>
      @error('jenis_asrama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="lokasi_asrama" class="form-label">Lokasi Asrama</label>
      <select class="form-select" name="lokasi_asrama" id="lokasi_asrama">
            <option value="Luar" selected>Luar</option>
            <option value="Dalam">Dalam</option>
      </select>
      @error('lokasi_asrama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="alamat_asrama" class="form-label">Alamat Asrama </label>
      <input type="text" class="form-control @error('alamat_asrama') is-invalid @enderror" id="alamat_asrama" name="alamat_asrama" required autofocus value="{{ old('alamat_asrama') }}">
      @error('alamat_asrama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Buat Asrama</button>
  </form>

</div>

@endsection
