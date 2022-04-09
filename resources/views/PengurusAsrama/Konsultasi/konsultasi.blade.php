@extends('layouts.main')

@section('container') 



<div class="container mt-5">
  <div class="table-responsive col-lg-12">
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
    <a href="/mahasiswa/konsultasi/create" class="btn btn-success mb-3" style="background:#00D9A5"><i class="bi bi-clipboard2-plus"></i> Permintaan Konsultasi</a>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col" class="text-center">Nama Dokter</th>
            <th scope="col" class="text-center">Tanggal Konsul</th>
            <th scope="col" class="text-center">Jam Konsul</th>
            <th scope="col" class="text-center">Alasan Konsultasi</th>
            <th scope="col" class="text-center">Persetujuan Dokter</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($konsultasis as $konsultasi)
          @if($konsultasi->acc_dokter == null)
          <tr>
            <td>{{$konsultasi->nama_dokter}}</td>
            <td class="text-center">{{date('d F Y', strtotime($konsultasi->tgl_konsul))}}</td>
            <td class="text-center">{{date('H:i', strtotime($konsultasi->tgl_konsul))}}</td>
            <td>{!! Str::limit(strip_tags($konsultasi->deskripsi),25) !!}</td>
            <td class="text-center">
              @if ($konsultasi->acc_dokter == null)
              Belum Ditentukan
              @elseif($konsultasi->acc_dokter == 'Setuju')
                  Konsultasi diterima
              @elseif($konsultasi->acc_dokter == 'Tidak Setuju')
                  Konsultasi ditolak
              @endif
            </td>
            <td>{!! $konsultasi->status !!}</td>
            <td>
              @if ($konsultasi->acc_dokter == null)
              <a href="/mahasiswa/konsultasi/{{$konsultasi->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>
              <a href="/mahasiswa/konsultasi/{{$konsultasi->id}}/edit" class="badge btn-warning"><i class="bi bi-pencil-fill"></i></a>
              <form action="/mahasiswa/konsultasi/{{$konsultasi->id}}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="badge btn-danger text-decoration-none border-0" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
              </form>
              @elseif($konsultasi->acc_dokter == 'Setuju' || $konsultasi->acc_dokter == 'Tidak Setuju')
              <a href="/mahasiswa/konsultasi/{{$konsultasi->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>
              @endif
            </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>

      <b><h4 class="mt-5">Riwayat Konsul</h4></b>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col" class="text-center">Nama Dokter</th>
            <th scope="col" class="text-center">Tanggal Konsul</th>
            <th scope="col" class="text-center">Jam Konsul</th>
            <th scope="col" class="text-center">Alasan Konsultasi</th>
            <th scope="col" class="text-center">Persetujuan Dokter</th>
            <th scope="col" class="text-center">Status</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($konsultasis as $konsultasi)
          @if($konsultasi->acc_dokter == 'Setuju' || $konsultasi->acc_dokter == 'Tidak Setuju')
          <tr>
            <td>{{$konsultasi->nama_dokter}}</td>
            <td>{{date('d F Y', strtotime($konsultasi->tgl_konsul))}}</td>
            <td>{{date('G:s', strtotime($konsultasi->tgl_konsul))}}</td>
            <td>{!! Str::limit(strip_tags($konsultasi->deskripsi),25) !!}</td>
            <td class="text-center">
              @if ($konsultasi->acc_dokter == null)
              Belum Ditentukan
              @elseif($konsultasi->acc_dokter == 'Setuju')
                  Konsultasi diterima
              @elseif($konsultasi->acc_dokter == 'Tidak Setuju')
                  Konsultasi ditolak
              @endif
            </td>
            <td>{!! $konsultasi->status !!}</td>
            <td>
              @if ($konsultasi->acc_dokter == null)
              <a href="/mahasiswa/konsultasi/{{$konsultasi->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>
              <a href="/mahasiswa/konsultasi/{{$konsultasi->id}}/edit" class="badge btn-warning"><i class="bi bi-pencil-fill"></i></a>
              <form action="/mahasiswa/konsultasi/{{$konsultasi->id}}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="badge btn-danger text-decoration-none border-0" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash3-fill"></i></button>
              </form>
              @elseif($konsultasi->acc_dokter == 'Setuju' || $konsultasi->acc_dokter == 'Tidak Setuju')
              <a href="/mahasiswa/konsultasi/{{$konsultasi->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>
              @endif
              
            </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection