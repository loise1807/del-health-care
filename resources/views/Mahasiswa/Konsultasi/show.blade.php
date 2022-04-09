@extends('layouts.main')

@section('container') 



<div class="container col-lg-8 mt-5">

  <div class="card border-primary border-3">
    <div class="card-header border-primary border-2">
      <b>Request Konsultasi</b>
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">

          <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label"><b>Nama</b></label>
            <div class="col-sm-8">
              <p>{!! $mahasiswa->nama !!}</p>            
            </div>
          </div>
          <div class="form-group row">
            <label for="nim" class="col-sm-4 col-form-label"><b>Nomor Induk Mahasiswa</b></label>
            <div class="col-sm-8">
              <p>{!! $mahasiswa->nim !!}</p>            
            </div>
          </div>
          <div class="form-group row">
            <label for="tgl_konsul" class="col-sm-4 col-form-label"><b>Tanggal Konsul</b></label>
            <div class="col-sm-8">
              <p>{{date('l, d F Y', strtotime($reqKonsul->tgl_konsul))}}</p>            
            </div>
          </div>
          <div class="form-group row">
            <label for="deskripsi" class="col-sm-4 col-form-label"><b>Alasan Konsultasi</b></label>
            <div class="col-sm-8">
              <p>{!! $reqKonsul->deskripsi !!}</p>            
            </div>
          </div>
          <div class="form-group row">
            <label for="status" class="col-sm-4 col-form-label"><b>Status</b></label>
            <div class="col-sm-8">
              <p>{!! $reqKonsul->status !!}</p>            
            </div>
          </div>
          
          <a href="/mahasiswa/konsultasi" class="btn btn-success"><i class="bi bi-arrow-return-left"></i></a>
          @if ($reqKonsul->acc_dokter == null)
          <a href="/mahasiswa/konsultasi/{{$reqKonsul->id}}/edit" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
          <form action="/mahasiswa/konsultasi/{{$reqKonsul->id}}" method="POST" class="d-inline">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger text-decoration-none border-0" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
          </form>
          @endif

        </blockquote>
    </div>
    
  </div>

</div>



@endsection