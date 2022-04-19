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


<div class="container mt-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
    <h1 class="h2">Edit Riwayat Penyakit: {{ $mahasiswa->nama }}</h1>
  </div>
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
    
    <form method="post" action="/dokter/riwayatpenyakits/{{$riwayatPenyakit->id}}">
      @method('put')
      @csrf
      <input type="hidden" name="id" id="id" value="{{ $riwayatPenyakit->id }}">
    <div class="mt-3 mb-3">
        <label for="nama_penyakit" class="form-label">Nama Penyakit </label>
        <input type="text" class="form-control @error('nama_penyakit') is-invalid @enderror" id="nama_penyakit" name="nama_penyakit" required autofocus value="{{ $riwayatPenyakit->nama_penyakit }}">
        @error('nama_penyakit')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary mb-3 mt-3 text-white" style="background-color: #07be94">Ubah Riwayat</button>
    </form>
  
  </div>
</div>

@endsection