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
            <label for="gejala" class="col-sm-2 col-form-label">Gejala</label>
            <div class="col-sm-10">
              <p>{!! $rekammedis->gejala !!}</p>            
            </div>
            <div class="form-group row">
              <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa</label>
              <div class="col-sm-10">
                <p>{!! $rekammedis->diagnosa !!}</p>            
              </div>
            </div>
            <div class="form-group row">
              <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
              <div class="col-sm-10">
                <p>{!! $rekammedis->deskripsi !!}</p>            
              </div>
          </div>
        </div>
          
        </blockquote>
        <a href="/dokter/rekammedis" class="btn btn-success"><i class="bi bi-arrow-return-left"></i></a>
        <a href="/dokter/rekammedis/{{$rekammedis->id}}/edit" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
        <form action="/dokter/rekammedis/{{$rekammedis->id}}" method="POST" class="d-inline">
          @method('DELETE')
          @csrf
          <button class="btn btn-danger text-decoration-none border-0" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
        </form>
    </div>
    
  </div>

</div>



@endsection