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



<div class="container mt-5" >
  <div class="table-responsive">
  
    <h1 class="mb-3" style="color: #07be94">Daftar Riwayat Penyakit</h1>
      <table class="table table-striped table-md">
        <thead>
          <tr>
            <th scope="col" class="">#</th>
            <th scope="col" class="">Nama Penyakit</th>
            <th scope="col" class="">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($riwayat_penyakits as $riwayat_penyakit)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{!! $riwayat_penyakit->nama_penyakit !!}</td>
            <td>
              <a href="/mahasiswa/riwayatpenyakits/{{$riwayat_penyakit->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection