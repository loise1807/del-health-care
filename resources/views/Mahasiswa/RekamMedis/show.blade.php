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

  <div class="card border-success border-3">

    <div class="card-body">
      <blockquote class="blockquote mb-0">
          <div class="form-group row g-2">
            <label for="gejala" class="col-sm-2 col-form-label"><b>Gejala</b></label>
            <p class="col-sm-10 text-dark">{!! $rekmed->gejala !!}</p>            
            
            <label for="diagnosa" class="col-sm-2 col-form-label"><b>Diagnosa</b></label>
            <p class="col-sm-10 text-dark">{!! $rekmed->diagnosa !!}</p>            
            
            <label for="deskripsi" class="col-sm-2 col-form-label"><b>Deskripsi</b></label>
            <p class="col-sm-10 text-dark">{!! $rekmed->deskripsi !!}</p>            
          </div>
        </blockquote>
        <a href="/mahasiswa/rekmeds" class="btn btn-success"><i class="bi bi-arrow-return-left"></i></a>
    </div>
    
  </div>

</div>



@endsection