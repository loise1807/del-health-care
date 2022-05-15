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

<div class="container mt-5 mb-5 col-lg-11">
  <div class="table-responsive">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <h1 class="mb-3" style="color: #07be94">Daftar Permintaan Konsultasi</h1>
      <table class="table table-hover table-striped table-lg" style="border-color: #07be94">
        <thead>
          <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Nama Mahasiswa</th>
            <th scope="col" class="text-center">Nama Dokter</th>
            <th scope="col" class="text-center">Tanggal Konsul</th>
            <th scope="col" class="text-center">Alasan Konsultasi</th>
            <th scope="col" class="text-center">Persetujuan Dokter</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($konsultasis as $konsultasi)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$konsultasi->nama_mahasiswa}}</td>
            <td>{{$konsultasi->nama_dokter}}</td>
            <td>{{date('l, d F Y', strtotime($konsultasi->tgl_konsul))}}</td>
            <td>{!! Str::limit(strip_tags($konsultasi->deskripsi),25) !!}</td>
            <td class="text-center">
              @if ($konsultasi->acc_dokter == null)
              <a href="#myFrom" class="badge bg-success">Terima</a>
              {{-- Pop Up Form --}}
              <div id="myFrom" class="pop-overlay animate">
                <div class="popup">
                  <a class="close" href="">&times;</a>
                  <form action="/dokter/konsultasi/{{$konsultasi->id}}/terima" method="post">
                    @method('put')
                    @csrf
                    <label for="info" class="text-white"><h4>Pemberitahuan Kepada Mahasiswa</h4></label>
                    <div class="mb-2 row g-2 col-md-12">
                      <label for="judul" class="form-label col-md-3 text-white">Judul</label>
                      <input type="text" name="judul" id="judul" class="form-control col-md-9" value="Pemberitahuan Konsultasi Diterima pada {{date('d F Y', strtotime($konsultasi->tgl_konsul))}}">
                    </div>
                    <div class="mb-2 row g-2 col-md-12">
                      <label for="isi" class="form-label col-md-3 text-white">Pesan</label>
                      <input type="text" name="isi" id="isi" class="form-control col-md-9" >
                    </div>
                    <button class="btn btn-success col-md-4">Kirim</button>
                  </form>
                </div>
              </div>
              {{-- End Pop Up Form --}}

              <a href="#myFrom2" class="badge bg-danger">Tolak</a>
              {{-- Pop Up Form --}}
              <div id="myFrom2" class="pop-overlay animate">
                <div class="popup">
                  <a class="close" href="">&times;</a>
                  <form action="/dokter/konsultasi/{{$konsultasi->id}}/tolak" method="post">
                    @method('put')
                    @csrf
                    <label for="info" class="text-white"><h4>Pemberitahuan Kepada Mahasiswa</h4></label>
                    <div class="mb-2 row g-2 col-md-12">
                      <label for="judul" class="form-label col-md-3 text-white">Judul</label>
                      <input type="text" name="judul" id="judul" class="form-control col-md-9" value="Pemberitahuan Konsultasi Ditolak pada {{date('d F Y', strtotime($konsultasi->tgl_konsul))}}">
                    </div>
                    <div class="mb-2 row g-2 col-md-12">
                      <label for="isi" class="form-label col-md-3 text-white">Pesan</label>
                      <input type="text" name="isi" id="isi" class="form-control col-md-9" >
                    </div>
                    <button class="btn btn-success col-md-4">Kirim</button>
                  </form>
                </div>
              </div>
              {{-- End Pop Up Form --}}

              @elseif($konsultasi->acc_dokter == 'Setuju')
                  Konsultasi diterima
              @elseif($konsultasi->acc_dokter == 'Tidak Setuju')
                  Konsultasi ditolak
              @endif
            </td>
            <td>{!! $konsultasi->status !!}</td>
            <td>
              @if ($konsultasi->telp_mahasiswa != null)
              <a href="https://api.whatsapp.com/send?phone=62{{ $konsultasi->telp_mahasiswa }}&text=Halo%20{{ $konsultasi->nama_mahasiswa }}.%20Tentang%20konsultasi%20pada%20{{date('l, d F Y', strtotime($konsultasi->tgl_konsul))}}%20pukul%20{{date('H:i', strtotime($konsultasi->tgl_konsul))}}" class="badge bg-success" target="_blank"><i class="bi bi-whatsapp"></i></a>
              @endif
              <a href="/dokter/konsultasi/{{$konsultasi->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>



@endsection