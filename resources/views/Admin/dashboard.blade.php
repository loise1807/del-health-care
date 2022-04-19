@extends('Admin.main')

@section('container-admin')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Halo <i>{{auth()->user()->username}}</i></h1>
</div>
  

  <div class="card-group text-center">
    <div class="card-body">
      <h5 class="card-title text-primary">Akun</h5>
      <a href="/admin/users">
        <span data-feather="user" class="text-primary" style="height: 100px; width: 100px;"></span>
      </a>
      <h2 class="card-text text-primary">{{$users->count()}}</h2>
    </div>
    <div class="card-body">
      <h5 class="card-title text-danger">Asrama</h5>
      <a href="/admin/asramas">
        <span data-feather="home" class="text-danger" style="height: 100px; width: 100px;"></span></a>
      <h2 class="card-text text-danger">{{$asramas->count()}}</h2>
    </div>
    <div class="card-body">
      <h5 class="card-title text-warning">Mahasiswa</h5>
      <a href="/admin/mahasiswas">
        <span data-feather="users" class="text-warning" style="height: 100px; width: 100px;"></span>
      </a>
      <h2 class="card-text text-warning">{{$mahasiswas->count()}}</h2>
    </div>
    <div class="card-body">
      <h5 class="card-title text-info">Pengurus</h5>
      <a href="/admin/petugas_asramas">
        <span data-feather="monitor" class="text-info" style="height: 100px; width: 100px;"></span>
      </a>
      <h2 class="card-text text-info">{{$petugas_asramas->count()}}</h2>
    </div>
    <div class="card-body">
      <h5 class="card-title text-success">Dokter</h5>
      <a href="/admin/dokters">
        <span data-feather="plus-square" class="text-success" style="height: 100px; width: 100px;"></span></a>
      <h2 class="card-text text-success">{{$dokters->count()}}</h2>
    </div>
  </div>
@endsection