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
      <b>Request Konsultasi</b>
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">

          <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label"><b>Nama</b></label>
            <div class="col-sm-8">
              {!! $mahasiswa->nama !!}            
            </div>
          </div>
          <div class="form-group row">
            <label for="nim" class="col-sm-4 col-form-label"><b>Nomor Induk Mahasiswa</b></label>
            <div class="col-sm-8">
              {!! $mahasiswa->nim !!}            
            </div>
          </div>
          <div class="form-group row">
            <label for="tgl_konsul" class="col-sm-4 col-form-label"><b>Tanggal Konsul</b></label>
            <div class="col-sm-8">
              {{date('l, d F Y', strtotime($reqKonsul->tgl_konsul))}}           
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-4 col-form-label"><b>Alasan Konsultasi</b></label>
            <div class="col-sm-8">
              {!! $reqKonsul->deskripsi !!}            
            </div>
          </div>
          <div class="form-group row">
            <label for="status" class="col-sm-4 col-form-label"><b>Status</b></label>
            <div class="col-sm-8">
              {!! $reqKonsul->status !!}            
            </div>
          </div>
          
          <a href="/dokter/konsultasi" class="btn btn-warning"><i class="bi bi-arrow-return-left"> Kembali</i></a>
          @if($reqKonsul->status == 'Menunggu')
          <a href="/dokter/konsultasi/{{$reqKonsul->id}}/terima" class="btn btn-success">Terima</a>
          <a href="/dokter/konsultasi/{{$reqKonsul->id}}/tolak" class="btn btn-danger">Tolak</a>
          @endif

        </blockquote>
    </div>
    
  </div>

</div>



@endsection