@extends('layouts.main')

@section('container') 



<div class="container col-lg-8 mt-5">

  <div class="card border-primary border-3">
    <div class="card-header border-primary border-2">
      <b>{{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</b>
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
          <div class="form-group row">
            <label for="nama_penyakit" class="col-sm-4 col-form-label"><i>Nama Penyakit</i></label>
            <div class="col-sm-8">
              <p><b>{!! $riwayat_penyakit->nama_penyakit !!}</b></p>            
            </div>
        </div>
          
        </blockquote>
        <a href="/mahasiswa/riwayatpenyakits" class="btn btn-success mt-3"><i class="bi bi-arrow-return-left"></i></a>
    </div>
    
  </div>

</div>



@endsection