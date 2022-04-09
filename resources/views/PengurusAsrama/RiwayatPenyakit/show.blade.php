@extends('layouts.main')

@section('container') 



<div class="container col-lg-8 mt-5">
  <div class="card border-2">
    
    <div class="card-body">
      <h5 class="card-title">{{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</h5>
      <h6 class="card-subtitle mb-2 text-muted">{{ $mahasiswa->asrama->nama_asrama }}</h6>
      <p class="card-text">Nama Penyakit: {{ $riwayatpenyakit->nama_penyakit }}</p>
      <a href="/pengurus/riwayatpenyakits" class="btn btn-success"><i class="bi bi-arrow-return-left"></i></a>
      <a href="/pengurus/riwayatpenyakits/{{$riwayatpenyakit->id}}/edit" class="btn bg-warning"><i class="bi bi-pen"></i></span></a>
      <form action="/pengurus/riwayatpenyakits/{{$riwayatpenyakit->id}}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn bg-danger text-decoration-none border-0" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></span></button>
      </form>
    </div>

  </div>
  
  
</div>





@endsection