@extends('layouts.main-toon')

@section('container') 

<div class="page-inner">

</div>
<!---->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Beranda</a>
    </li>
    <li class="breadcrumb-item active">{{ $title }}</li>
</ol>



<div class="container mt-5">
  <div class="col-lg-8">
    <form method="post" action="/mahasiswa/konsultasi">
      @csrf
      <input type="hidden" name="mhs_id" id="mhs_id" value="{{ $mahasiswa->mhs_id }}">
      <div class="mb-3">
        <label for="dokter_id" class="form-label"><b>Nama Dokter</b></label>
        <select class="form-select" name="dokter_id" id="dokter_id">
          @foreach($dokters as $dokter)
              <option value="{{ $dokter->id }}">{{ $dokter->nama }} - Spesialis: {{ $dokter->spesialis }}</option>
          @endforeach
        </select>
        @error('dokter_id')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="tgl_konsul" class="form-label"><b>Tanggal dan Waktu Konsultasi</b></label>
        <input type="datetime-local" class="form-control @error('tgl_konsul') is-invalid @enderror col-md-4" name="tgl_konsul" id="tgl_konsul">
        @error('tgl_konsul')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label"><b>Alasan Permintaan Konsultasi</b></label>
        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
        <trix-editor input="deskripsi"></trix-editor>
        @error('deskripsi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary mb-3 mt-3">Kirim Permintaan Konsultasi</button>
    </form>
  
  </div>
</div>

@endsection