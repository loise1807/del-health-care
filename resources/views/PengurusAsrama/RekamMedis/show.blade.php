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

  <div class="card border-primary border-3">
    <div class="card-header border-primary border-2">
      <b>{{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</b>
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
          <div class="form-group row">
            <label for="gejala" class="col-sm-2 col-form-label">Gejala</label>
            <div class="col-sm-10">
              <p>{!! $rekmed->gejala !!}</p>            
            </div>
            <div class="form-group row">
              <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa</label>
              <div class="col-sm-10">
                <p>{!! $rekmed->diagnosa !!}</p>            
              </div>
            </div>
            <div class="form-group row">
              <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
              <div class="col-sm-10">
                <p>{!! $rekmed->deskripsi !!}</p>            
              </div>
          </div>
        </div>
          
        </blockquote>
        <a href="/pengurus/rekmeds" class="btn btn-success"><i class="bi bi-arrow-return-left"></i></a>
    </div>
    
  </div>

</div>



@endsection