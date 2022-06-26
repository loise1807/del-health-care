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
    <form method="post" action="/dokter/rekammedis">
      @csrf

      {{-- Nama Mahasiswa --}}
      <div class="mb-3">
        <label for="mhs_id" class="form-label"><b>Nama Mahasiswa</b></label>
        <select class="form-select" name="mhs_id" id="mhs_id">
          @foreach($mahasiswas as $mahasiswa)
              <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama }} ({{ $mahasiswa->prodi }} {{ $mahasiswa->angkatan }})</option>
          @endforeach
        </select>
        @error('mhs_id')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      {{-- Tanggal --}}
      <div class="mb-3">
        <label for="tanggal" class="form-label"><b>Tanggal</b></label>
        <input type="date" class="form-control @error('tanggal') is-invalid @enderror col-md-3" id="tanggal" name="tanggal" required value="{{ old('tanggal') }}">
        @error('tanggal')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      {{-- Anamnesa --}}
      <div class="mb-3">
        <label for="anamnesa" class="form-label"><b>Anamnesa</b></label>
        <input id="anamnesa" type="hidden"  class="@error('anamnesa') is-invalid @enderror" name="anamnesa" value="{{ old('anamnesa') }}">
        <trix-editor input="anamnesa"></trix-editor>
        @error('anamnesa')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      {{-- Pemeriksaan Fisik --}}
      <div class="mb-3">
        <label for="pemeriksaan_fisik" class="form-label"><b>Pemeriksaan Fisik</b></label>
        <input id="pemeriksaan_fisik" type="hidden" name="pemeriksaan_fisik" value="{{ old('pemeriksaan_fisik') }}">
        <trix-editor input="pemeriksaan_fisik"></trix-editor>
        @error('pemeriksaan_fisik')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      {{-- Diagnosa --}}
      <div class="mb-3">
        <label for="diagnosa" class="form-label"><b>Diagnosa</b></label>
        <input id="diagnosa" type="hidden" name="diagnosa" value="{{ old('diagnosa') }}">
        <trix-editor input="diagnosa"></trix-editor>
        @error('diagnosa')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      {{-- PENATALAKSANAAN DAN EDUKASI  --}}
      <div class="mb-3">
        <label for="plksn_edukasi" class="form-label"><b>Penatalaksanaan & Edukasi</b></label>
        <input id="plksn_edukasi" type="hidden" name="plksn_edukasi" value="{{ old('plksn_edukasi') }}">
        <trix-editor input="plksn_edukasi"></trix-editor>
        @error('plksn_edukasi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>


      <button type="submit" class="btn btn-primary mb-3 mt-3 text-white" style="background-color: #07be94">Tambah Rekam Medis</button>
    </form>
  
  </div>
</div>

@endsection