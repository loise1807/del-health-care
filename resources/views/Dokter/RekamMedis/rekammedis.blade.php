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
  <div class="table-responsive">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <h1 class="mb-3" style="color: #07be94">Daftar Rekam Medis</h1>
    <a href="/dokter/rekammedis/create" class="btn text-white mb-3" style="background-color: #07be94;"><i class="bi bi-clipboard2-plus"></i> Rekam Medis</a>
      <table class="table table-hover table-striped table-lg" style="border-color: #07be94">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Mahasiswa</th>
            <th scope="col">Gejala</th>
            <th scope="col">Diagnosa</th>
            <th scope="col">Deskripsi</th>
            {{-- <th scope="col">Tanggal Dibuat</th> --}}
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($rekammedis as $rekmed)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$rekmed->nama_mahasiswa}}</td>
            <td>{!! Str::limit(($rekmed->gejala),50) !!}</td>
            <td>{!! Str::limit(($rekmed->diagnosa),50) !!}</td>
            <td>{!! Str::limit(strip_tags($rekmed->deskripsi),40) !!}</td>
            {{-- <td>{{$rekmed->tanggal}}</td> --}}
            <td>
              <a href="/dokter/rekammedis/{{$rekmed->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>
              <a href="/dokter/rekammedis/{{$rekmed->id}}/edit" class="badge bg-warning"><i class="bi bi-pen"></i></a>
              <form action="/dokter/rekammedis/{{$rekmed->id}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger text-decoration-none border-0" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection