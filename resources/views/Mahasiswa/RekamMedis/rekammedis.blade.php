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



<div class="container mt-5 col-md-11">
  <div class="table-responsive">
    <h1 class="mb-3" style="color: #07be94">Daftar Rekam Medis</h1>
    <div class="card-body row g-2 col-md-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col" >Tanggal</th>
            <th scope="col" >Anamnesa</th>
            <th scope="col" >Pemeriksaan Fisik</th>
            <th scope="col" >Diagnosa</th>
            <th scope="col" >Penatalaksanaan & Edukasi</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($rekammedis as $rekmeds)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{date('d F Y', strtotime($rekmeds->tanggal))}} </td>
            <td>{{ Str::limit(strip_tags($rekmeds->anamnesa),50) }}</td>
            <td>{!! Str::limit(($rekmeds->pemeriksaan_fisik),50) !!}</td>
            <td>{!! Str::limit(($rekmeds->diagnosa),50) !!}</td>
            <td>{!! Str::limit(($rekmeds->plksn_edukasi),50) !!}</td>
            <td class="text-center">
              <a href="/mahasiswa/rekmeds/{{$rekmeds->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
</div>

@endsection