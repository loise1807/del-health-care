@extends('layouts.main')

@section('container') 



<div class="container col-lg-8 mt-5">
  <div class="table-responsive col-lg-10">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif
    <a href="/dokter/riwayatpenyakits/create" class="btn btn-secondary mb-3"><i class="bi bi-file-medical"></i> Tambah Riwayat Penyakit</a>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Mahasiswa</th>
            <th scope="col">Nama Penyakit</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($riwayatpenyakits as $riwayatpenyakit)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$riwayatpenyakit->nama_mahasiswa}}</td>
            <td>{{$riwayatpenyakit->nama_penyakit}}</td>
            <td>
              <a href="/dokter/riwayatpenyakits/{{$riwayatpenyakit->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></span></a>
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
    </div>
</div>

@endsection