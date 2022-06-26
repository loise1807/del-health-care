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
  <div class="card border-2">
    <div class="card-body">
      <h5 class="card-title">{{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</h5>
      <h6 class="card-title">Lokasi Asrama: <b>{{ $mahasiswa->asrama->nama_asrama }}</b></h6>

      <h6 class="mt-3">Daftar Riwayat Penyakit</h6>
      <table class="table table-striped table-lg col-lg-6">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col" >Nama Penyakit</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($riwayatpenyakits as $riwayatpenyakit)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $riwayatpenyakit->nama_penyakit }} </td>
            <td class="text-center">
              {{-- <a href="/dokter/riwayatpenyakits/{{$riwayatpenyakit->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></span></a> --}}
              <a href="/dokter/riwayatpenyakits/{{$riwayatpenyakit->id}}/edit" class="badge bg-warning"><i class="bi bi-pen"></i></span></a>
              <form action="/dokter/riwayatpenyakits/{{$riwayatpenyakit->id}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger text-decoration-none border-0" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></span></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
      <a href="/dokter/riwayatpenyakits" class="btn btn-primary"><i class="bi bi-arrow-return-left"> Kembali</i></a>
      @if ($mahasiswa->no_telp != null)
      <a href="https://api.whatsapp.com/send/?phone=62{{ $mahasiswa->no_telp }}" target=".blank" class="btn btn-success"><i class="bi bi-whatsapp"> Whatsapp</i></a>
      @endif
    </div>
  </div>
</div>



@endsection