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
      <input type="hidden" name="tanggal" id="tanggal" value="{{ date("Y-m-d",time()) }}">
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
        <label for="gejala" class="form-label"><b>Gejala</b></label>
        {{-- <input type="text" class="form-control @error('gejala') is-invalid @enderror" id="gejala" name="gejala" required value="{{ old('gejala') }}"> --}}
        <input id="gejala" type="hidden" name="gejala" value="{{ old('gejala') }}">
        <trix-editor input="gejala"></trix-editor>
        @error('gejala')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="diagnosa" class="form-label"><b>Diagnosa</b></label>
        {{-- <input type="text" class="form-control @error('diagnosa') is-invalid @enderror" id="diagnosa" name="diagnosa" required value="{{ old('diagnosa') }}"> --}}
        <input id="diagnosa" type="hidden" name="diagnosa" value="{{ old('diagnosa') }}">
        <trix-editor input="diagnosa"></trix-editor>
        @error('diagnosa')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label"><b>Deskripsi</b></label>
        {{-- <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" required value="{{ old('deskripsi') }}"> --}}
        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
        <trix-editor input="deskripsi"></trix-editor>
        @error('deskripsi')
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