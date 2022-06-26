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



<div class="container mt-5 col-md-10">
  <h4 class="mb-2">Detail Rekam Medis Mahasiswa <i>{{ $mahasiswa->nama }}</i></h4>
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
          <tbody>
            <tr>
              <td><b>Tanggal</b></td>
              <td>{!! $rekammedis->tanggal !!}</td>
            </tr>
            <tr>
              <td><b>Anamnesa</b></td>
              <td>{!! $rekammedis->anamnesa !!}</td>
            </tr>
            <tr>
              <td><b>Pemeriksaan Fisik</b></td>
              <td>{!! $rekammedis->pemeriksaan_fisik !!}</td>
            </tr>
            <tr>
              <td><b>Diagnosa</b></td>
              <td>{!! $rekammedis->diagnosa !!}</td>
            </tr>
            <tr>
              <td><b>Penatalaksanaan & Edukasi</b></td>
              <td>{!! $rekammedis->plksn_edukasi !!}</td>
            </tr>
          </tbody>
        </table>
        <a href="/dokter/rekammedis/{{ $mahasiswa->nim }}" class="btn btn-primary col-lg-2"><i class="bi bi-arrow-return-left"> Kembali</i></a>
      </div>
    </div>

</div>

<script>
  function myFunction() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

  
    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnText.innerHTML = "Read more"; 
      moreText.style.display = "none";
    } else {
      dots.style.display = "none";
      btnText.innerHTML = "Read less"; 
      moreText.style.display = "inline";
    }
  }
  </script>

@endsection