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



{{-- <div class="container mt-5">
  <div class="table-responsive">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @elseif(session()->has('success-delete'))
    <div class="alert alert-danger" role="alert">
      {{ session('success-delete') }}
    </div>
    @elseif(session()->has('success-edit'))
    <div class="alert alert-warning" role="alert">
      {{ session('success-edit') }}
    </div>
    @endif
    <h1 class="mb-3" style="color: #07be94">Daftar Rekam Medis</h1>

      <table class="table table-hover table-striped table-lg" style="border-color: #07be94">
        <thead>
          <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Nama Mahasiswa</th>
            <th scope="col" class="text-center">Tanggal</th>
            <th scope="col" class="text-center">Gejala</th>
            <th scope="col" class="text-center">Diagnosa</th>
            <th scope="col" class="text-center">Deskripsi</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($rekmeds as $rekmed)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{!! $rekmed->nama_mahasiswa !!}</td>
            <td>{{date('l, d F Y', strtotime($rekmed->tanggal))}}</td>
            <td>{!! $rekmed->gejala !!}</td>
            <td>{!! Str::limit(strip_tags($rekmed->diagnosa),25) !!}</td>
            <td>{!! Str::limit(strip_tags($rekmed->deskripsi),25) !!}</td>
            <td>
              <a href="/pengurus/rekmeds/{{$rekmed->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div> --}}

<div class="container mt-5">
  <div class="table-responsive">
    @if(session()->has('success-create'))
    <div class="alert alert-success col-lg-4" role="alert">
      {{ session('success-create') }}
    </div>
    @elseif(session()->has('success-update'))
    <div class="alert alert-warning col-lg-4" role="alert">
      {{ session('success-update') }}
    </div>
    @elseif(session()->has('success-delete'))
    <div class="alert alert-warning col-lg-4" role="alert">
      {{ session('success-delete') }}
    </div>
    @endif

    <h1 class="mb-3" style="color: #07be94">Daftar Rekam Medis</h1>
    <div>
      <form action="/pengurus/rekmeds" >
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
            <th scope="col">Nama Mahasiswa</th>
            <th scope="col">Program Studi</th>
            <th scope="col">Jumlah Rekam Medis</th>
            {{-- <th scope="col">Tanggal Dibuat</th> --}}
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($mahasiswa as $mahasiswa)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$mahasiswa->nim}} - {{$mahasiswa->nama}}</td>
            <td>{{$mahasiswa->prodi}} {{$mahasiswa->angkatan}}</td>
            <td style="align-items: center">
              @php
               $count=0;  
              @endphp
              @foreach ($rekammedis as $rekmed)
              @if($rekmed->mhs_id === $mahasiswa->id)
              @php
               $count++;
              @endphp
              @endif
              @endforeach
              {{ $count }}
            </td>
            <td>
              <a href="/pengurus/rekmeds/{{$mahasiswa->nim}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>
              @if ($mahasiswa->no_telp != null)
              <a href="https://api.whatsapp.com/send/?phone=62{{ $mahasiswa->no_telp }}" target=".blank" class="badge bg-success"><i class="bi bi-whatsapp"></i></a>
              @endif
              {{-- <form action="/dokter/rekammedis/{{$mahasiswa->id}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger text-decoration-none border-0" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
              </form> --}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection