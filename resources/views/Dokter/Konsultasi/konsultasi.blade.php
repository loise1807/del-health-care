@extends('layouts.main')

@section('container') 



<div class="container mt-5">
  <div class="table-responsive col-lg-12">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
      <table class="table table-striped table-sm">
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
              <a href="/dokter/konsultasi/{{$konsultasi->id}}/terima" class="badge bg-success">Terima</a>
              <a href="/dokter/konsultasi/{{$konsultasi->id}}/tolak" class="badge bg-danger">Tolak</a>
              @elseif($konsultasi->acc_dokter == 'Setuju')
                  Konsultasi diterima
              @elseif($konsultasi->acc_dokter == 'Tidak Setuju')
                  Konsultasi ditolak
              @endif
            </td>
            <td>{!! $konsultasi->status !!}</td>
            <td>
              <a href="/dokter/konsultasi/{{$konsultasi->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection