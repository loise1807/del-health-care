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

  <div class="card border-success">
    <div class="card-header border-success border-2">
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
          <div class="form-group row g-2">
            <label for="nama_penyakit" class="col-sm-4 col-form-label"><b>Nama Penyakit</b></label>
            <p class="col-sm-8 text-dark">{!! $riwayat_penyakit->nama_penyakit !!}</p>            
          </div>
          
        </blockquote>
        <a href="/mahasiswa/riwayatpenyakits" class="btn btn-success mt-3"><i class="bi bi-arrow-return-left"></i></a>
    </div>
    
  </div>

</div>



@endsection