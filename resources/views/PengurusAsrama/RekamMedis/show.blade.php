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

  <div class="card border-primary border-3">
    <div class="card-header border-primary border-2">
      <b>{{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</b>
    </div>
    <div class="card-body">
      <blockquote class="blockquote mb-0">
          <div class="form-group row">
            <label for="gejala" class="col-sm-2 col-form-label">Gejala</label>
            <div class="col-sm-10">
              <p>{!! $rekmed->gejala !!}</p>            
            </div>
            <div class="form-group row">
              <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa</label>
              <div class="col-sm-10">
                <p>{!! $rekmed->diagnosa !!}</p>            
              </div>
            </div>
            <div class="form-group row">
              <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
              <div class="col-sm-10">
                <p>{!! $rekmed->deskripsi !!}</p>            
              </div>
          </div>
        </div>
          
        </blockquote>
        <a href="/pengurus/rekmeds" class="btn btn-success"><i class="bi bi-arrow-return-left"></i></a>
    </div>
    
  </div>

</div> --}}

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
              
              <a href="/pengurus/rekmeds/show/{{$rekmeds->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="/pengurus/rekmeds" class="btn btn-primary col-lg-2"><i class="bi bi-arrow-return-left"> Kembali</i></a>
    </div>
  </div>

</div>


@endsection