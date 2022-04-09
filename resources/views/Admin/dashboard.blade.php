@extends('Admin.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Halo {{auth()->user()->username}}</h1>
</div>

<div class="table-responsive col-lg-10">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col" class="text-center">#</th>
          <th scope="col" class="text-center">Akun</th>
          <th scope="col" class="text-center">Asrama</th>
          <th scope="col" class="text-center">Mahasiswa</th>
          <th scope="col" class="text-center">Petugas Asrama</th>
          <th scope="col" class="text-center">Dokter</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center">Jumlah Data</td>
          <td class="text-center">{{$users->count()}}</td>
          <td class="text-center">{{$asramas->count()}}</td>
          <td class="text-center">{{$mahasiswas->count()}}</td>
          <td class="text-center">{{$petugas_asramas->count()}}</td>
          <td class="text-center">{{$dokters->count()}}</td>
      </tbody>
    </table>
  </div>
@endsection