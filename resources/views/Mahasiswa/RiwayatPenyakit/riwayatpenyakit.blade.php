@extends('layouts.main')

@section('container') 



<div class="container mt-5 text-center" >
  <div class="table-responsive col-lg-5">
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
      <table class="table table-striped table-md">
        <thead>
          <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Nama Penyakit</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($riwayat_penyakits as $riwayat_penyakit)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{!! $riwayat_penyakit->nama_penyakit !!}</td>
            <td>
              <a href="/mahasiswa/riwayatpenyakits/{{$riwayat_penyakit->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection