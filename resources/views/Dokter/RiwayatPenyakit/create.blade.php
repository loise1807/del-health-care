@extends('layouts.main')

@section('container') 



<div class="container col-lg-8 mt-5">
  <div class="col-lg-6">
  
    <form method="post" action="/dokter/riwayatpenyakits">
      @csrf
      <div class="mb-3">
        <label for="mhs_id" class="form-label"><b>Nama Mahasiswa</b></label>
        <select class="form-select" name="mhs_id" id="mhs_id">
          @foreach($mahasiswas as $mahasiswa)
              <option value="{{ $mahasiswa->mhs_id }}">{{ $mahasiswa->nama_mahasiswa }}</option>
          @endforeach
        </select>
        @error('mhs_id')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nama_penyakit" class="form-label">Nama Penyakit</label>
        <input type="text" class="form-control @error('nama_penyakit') is-invalid @enderror" id="nama_penyakit" name="nama_penyakit" required value="{{ old('nama_penyakit') }}">
        @error('nama_penyakit')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary mb-3 mt-3">Tambah Riwayat Penyakit</button>
    </form>
  
  </div>
</div>

@endsection