@extends('layouts.main')

@section('container') 

<div class="container col-lg-8 mt-3 mb-5">
  <div class="card border-primary border-3">
    <div class="card-header border-primary border-2">
      <b>Edit Permintaan Konsultasi: &nbsp{{ $mahasiswa->nama }}({{ $mahasiswa->nim }})</b>
    </div>

    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <form method="post" action="/mahasiswa/konsultasi/{{$konsultasi->id}}">

          @method('put')
          @csrf
          <input type="hidden" name="id" id="id" value="{{ $konsultasi->id }}">
          <div class="form-group row">
            <label for="dokter_id" class="form-label"><h5>Nama Dokter</h5></label>
            <select class="form-select" name="dokter_id" id="dokter_id">
              @foreach($dokters as $dokter)
              @if($dokter->id == $konsultasi->dokter_id)
              <option value="{{ $dokter->id }}" selected>{{ $dokter->nama }} - Spesialis: {{ $dokter->spesialis }}</option>
              @endif
              @if($dokter->id != $konsultasi->dokter_id)
              <option value="{{ $dokter->id }}">{{ $dokter->nama }} - Spesialis: {{ $dokter->spesialis }}</option>
              @endif
              @endforeach
            </select>
            @error('dokter_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          <div class="form-group row">
            <label for="tgl_konsul" class="form-label"> <h5>Tanggal Permintaan Konsultasi: </h5> </label>
            <input type="datetime-local" name="tgl_konsul" id="tgl_konsul" value="{{date('Y-m-d\TH:i', strtotime($konsultasi->tgl_konsul))}}" class="col-md-3">
            @error('tgl_konsul')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group row">
            <label for="deskripsi" class="form-label"> <h5>Alasan Permintaan Konsultasi: </h5> </label>
            <input id="deskripsi" type="hidden" name="deskripsi" value="{{ $konsultasi->deskripsi }}">
            <trix-editor input="deskripsi"></trix-editor>
            @error('deskripsi')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Ubah Permintaan Konsultasi</button>

        </form>
      </blockquote>
    </div>

  </div>
</div>


@endsection