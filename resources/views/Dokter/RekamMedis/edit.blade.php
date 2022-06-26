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

<div class="container mt-3 mb-5">
  <div class="card border-primary border-3">
    <div class="card-header border-primary border-2">
      <b>Edit Rekam Medis: &nbsp{{ $mahasiswa->nama }}({{ $mahasiswa->nim }})</b>
    </div>

    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <form method="post" action="/dokter/rekammedis/{{$rekammedis->id}}" class="col-md-10">

          @method('put')
          @csrf
          
          <input type="hidden" name="id_rekmed" id="id_rekmed" value="{{ $rekammedis->id }}">

          <div class="form-group row">
            <label for="tanggal" class="form-label"> <h5>Tanggal: </h5> </label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror col-md-3" id="tanggal" name="tanggal" required value="{{date('Y-m-d', strtotime($rekammedis->tanggal))}}">
            @error('tanggal')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group row">
            <label for="anamnesa" class="form-label"> <h5>Anamnesa: </h5> </label>
            <input id="anamnesa" type="hidden" name="anamnesa" value="{{ $rekammedis->anamnesa }}">
            <trix-editor input="anamnesa"></trix-editor>
            @error('anamnesa')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group row">
            <label for="pemeriksaan_fisik" class="form-label"> <h5>Pemeriksaan Fisik: </h5> </label>
            <input id="pemeriksaan_fisik" type="hidden" name="pemeriksaan_fisik" value="{{ $rekammedis->pemeriksaan_fisik }}">
            <trix-editor input="pemeriksaan_fisik"></trix-editor>
            @error('pemeriksaan_fisik')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group row">
            <label for="diagnosa" class="form-label"> <h5>Diagnosa: </h5> </label>
            <input id="diagnosa" type="hidden" name="diagnosa" value="{{ $rekammedis->diagnosa }}">
            <trix-editor input="diagnosa"></trix-editor>
            @error('diagnosa')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group row">
            <label for="plksn_edukasi" class="form-label"> <h5>Penatalaksanaan & Edukasi: </h5> </label>
            <input id="plksn_edukasi" type="hidden" name="plksn_edukasi" value="{{ $rekammedis->plksn_edukasi }}">
            <trix-editor input="plksn_edukasi"></trix-editor>
            @error('plksn_edukasi')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary mb-3 mt-3 text-white" style="background-color: #07be94">Ubah Rekam Medis</button>

        </form>
      </blockquote>
    </div>

  </div>
</div>


@endsection