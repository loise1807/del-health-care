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
    @if(session()->has('success-update'))
    <div class="alert alert-warning col-lg-4" role="alert">
      {{ session('success-update') }}
    </div>
    @elseif(session()->has('success-create'))
    <div class="alert alert-success col-lg-4" role="alert">
      {{ session('success-create') }}
    </div>
    @elseif(session()->has('success-delete'))
    <div class="alert alert-danger col-lg-4" role="alert">
      {{ session('success-delete') }}
    </div>
    @endif

    <h1 class="mb-3" style="color: #07be94">Daftar Riwayat Penyakit</h1>
    
    <a href="/dokter/riwayatpenyakits/create" class="btn text-white mb-3" style="background-color: #07be94;"><i class="bi bi-file-medical"></i> Tambah Riwayat Penyakit</a>
    <div>
      <form action="/dokter/riwayatpenyakits" >
        <div class="input-group mb-3">
            <input type="text" class="form-control col-md-4" placeholder="Cari..." name="search" value="{{ request('search') }}">
          <button class="btn btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
        </div>
      </form>
    </div>
      <table class="table table-hover table-striped table-lg" style="border-color: #07be94">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col" >Nama Mahasiswa</th>
            <th scope="col" >Program Studi</th>
            <th scope="col" >Angkatan</th>
            <th scope="col" >Nama Penyakit</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($names as $name)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td><a href="/dokter/riwayatpenyakits/{{$name->mhs_id}}" class="text-black">{{$name->nama_mahasiswa}}</a></td>
            <td>{{$name->prodi_mahasiswa}}</td>
            <td>{{ $name->angkatan_mahasiswa }}</td>
            <td>
              @php
               $count=0;  
              @endphp
              @foreach ($riwayatpenyakits as $riwayatpenyakit)
              @if($riwayatpenyakit->mhs_id == $name->mhs_id && $count<3)
              @php
               $count++;
              @endphp
              - {{ $riwayatpenyakit->nama_penyakit }} <br>
              @endif
              @endforeach
            </td> 
            <td>
              <a href="/dokter/riwayatpenyakits/{{$name->mhs_id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></span></a>
              @if ($name->no_telp != null)
              <a href="https://api.whatsapp.com/send/?phone=62{{ $name->no_telp }}" target=".blank" class="badge bg-success"><i class="bi bi-whatsapp"></i></a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection