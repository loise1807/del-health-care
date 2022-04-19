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
    <h1 class="mb-3" style="color: #07be94">Daftar Rekam Medis</h1>
      <table class="table table-hover table-striped table-lg" style="border-color: #07be94">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Gejala</th>
            <th scope="col">Diagnosa</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($rekmeds as $rekmed)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{!! $rekmed->gejala !!}</td>
            <td>{!! Str::limit(strip_tags($rekmed->diagnosa),25) !!}</td>
            <td>{!! Str::limit(strip_tags($rekmed->deskripsi),25) !!}</td>
            <td>
              <a href="/mahasiswa/rekmeds/{{$rekmed->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection