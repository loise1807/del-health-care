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
    @if(session()->has('success-create'))
    <div class="alert alert-success" role="alert">
      {{ session('success-create') }}
    </div>
    @elseif(session()->has('success-delete'))
    <div class="alert alert-danger" role="alert">
      {{ session('success-delete') }}
    </div>
    @elseif(session()->has('success-update'))
    <div class="alert alert-warning" role="alert">
      {{ session('success-update') }}
    </div>
    @endif
    <h1 class="mb-3" style="color: #07be94">Daftar Riwayat Penyakit</h1>
    <a href="/pengurus/riwayatpenyakits/create" class="btn text-white mb-3" style="background-color: #07be94;"><i class="bi bi-file-medical"></i> Tambah Riwayat Penyakit</a>

    <table class="table table-hover table-striped table-lg" style="border-color: #07be94">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" >Nama Mahasiswa</th>
          <th scope="col" >Nama Penyakit</th>
          <th scope="col" class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($names as $name)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$name->nama_mahasiswa}}</td>
          <td>
            @foreach ($riwayatpenyakits as $riwayatpenyakit)
            @if($riwayatpenyakit->mhs_id == $name->mhs_id)
            - {{ $riwayatpenyakit->nama_penyakit }} <br>
            @endif
            @endforeach
          </td>
          <td class="text-center">
            <a href="/pengurus/riwayatpenyakits/{{$name->mhs_id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></span></a>
            {{-- <a href="/dokter/riwayatpenyakits/{{$name->mhs_id}}/edit" class="badge bg-warning"><i class="bi bi-pen"></i></span></a>
            <form action="/dokter/riwayatpenyakits/{{$name->mhs_id}}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger text-decoration-none border-0" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></span></button>
            </form> --}}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
</div>

@endsection