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
  <h4 class="mb-2">Daftar Rekam Medis Mahasiswa <i>{{ $mahasiswa->nama }}</i></h4>
  <div class="card col-md-12" style="border:3px solid;border-color: #07BE94">
    @if(session()->has('success-create'))
    <div class="alert alert-success col-lg-4" role="alert">
      {{ session('success-create') }}
    </div>
    @elseif(session()->has('success-update'))
    <div class="alert alert-warning col-lg-4" role="alert">
      {{ session('success-update') }}
    </div>
    @elseif(session()->has('success-delete'))
    <div class="alert alert-danger col-lg-4" role="alert">
      {{ session('success-delete') }}
    </div>
    @endif
    <div class="card-body row g-2 col-md-7">
      <label class="col-md-6">Nama Mahasiswa</label>
      <label class="col-md-6">{{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</label>

      <label class="col-md-6">Umur/ Tanggal Lahir</label>
      @php
          $tanggal = new DateTime($mahasiswa->tanggal_lahir);
          $today = new DateTime('today');
          $y = $today->diff($tanggal)->y; 

      @endphp
      <label class="col-md-6">{{ $y }} Tahun - {{date('d F Y', strtotime($mahasiswa->tanggal_lahir))}}</label>
      
      <label class="col-md-6">Program Studi</label>
      <label class="col-md-6">{{ $mahasiswa->prodi }}</label>

      <label class="col-md-6">Angkatan</label>
      <label class="col-md-6">{{ $mahasiswa->angkatan }}</label>

      <label class="col-md-6">No Telepon</label>
      @if ($mahasiswa->no_telp != null)
      <label class="col-md-6"><a href="https://api.whatsapp.com/send/?phone=62{{ $mahasiswa->no_telp }}" target=".blank" class="">62{{ $mahasiswa->no_telp }}</a></label>
      @else
      <label class="col-md-6">-</label>
      @endif

      <label class="col-md-6">Nomor BPJS</label>
      <label class="col-md-6">{{ $mahasiswa->no_bpjs }}</label>

      <label class="col-md-6">Status</label>
      <label class="col-md-6">{{ $mahasiswa->status }}</label>

    </div>

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
              
              <a href="/dokter/rekammedis/show/{{$rekmeds->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>
              <a href="/dokter/rekammedis/{{$rekmeds->id}}/edit" class="badge bg-warning"><i class="bi bi-pencil-fill"></i></a>
              <form action="/dokter/rekammedis/{{$rekmeds->id}}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="badge bg-danger text-decoration-none border-0" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="/dokter/rekammedis" class="btn btn-primary col-lg-2"><i class="bi bi-arrow-return-left"> Kembali</i></a>
    </div>
    
  </div>
</div>
  


@endsection