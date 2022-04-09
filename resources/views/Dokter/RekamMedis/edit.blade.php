@extends('layouts.main')

@section('container') 

<div class="container col-lg-8 mt-3 mb-5">
  <div class="card border-primary border-3">
    <div class="card-header border-primary border-2">
      <b>Edit Rekam Medis: &nbsp{{ $mahasiswa->nama }}({{ $mahasiswa->nim }})</b>
    </div>

    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <form method="post" action="/dokter/rekammedis/{{$rekammedis->id}}">

          @method('put')
          @csrf
          
          <input type="hidden" name="id" id="id" value="{{ $rekammedis->id }}">
          <input type="hidden" name="tanggal" id="tanggal" value="{{ $rekammedis->tanggal }}">

          <div class="form-group row">
            <label for="gejala" class="form-label"> <h5>Gejala: </h5> </label>
            <input id="gejala" type="hidden" name="gejala" value="{{ $rekammedis->gejala }}">
            <trix-editor input="gejala"></trix-editor>
            @error('gejala')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group row">
            <label for="diagnosa" class="form-label"> <h5>diagnosa: </h5> </label>
            <input id="diagnosa" type="hidden" name="diagnosa" value="{{ $rekammedis->diagnosa }}">
            <trix-editor input="diagnosa"></trix-editor>
            @error('diagnosa')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group row">
            <label for="deskripsi" class="form-label"> <h5>Deskripsi: </h5> </label>
            <input id="deskripsi" type="hidden" name="deskripsi" value="{{ $rekammedis->deskripsi }}">
            <trix-editor input="deskripsi"></trix-editor>
            @error('deskripsi')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Ubah Rekam Medis</button>

        </form>
      </blockquote>
    </div>

  </div>
</div>


@endsection