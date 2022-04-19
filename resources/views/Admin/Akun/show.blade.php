@extends('Admin.main')

@section('container-admin')

<div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-12">
        
        @if($user->role == 'admin')
        <h3>Akun {{$user->username}}</h3>
        <p><b>Username  :</b> <i>{{$user->username}}</i> </p>
        <p><b>Role :</b> <i>{{$user->role}}</i> </p>
        @elseif($user->role == 'mahasiswa' && $mahasiswa != null)
        <h3><i>{{$user->username}}</i> - ({{ $user->role }})</h3>
        <p class="mt-3">Status: Terhubung dengan <b>{{$mahasiswa->nama}} ({{ $mahasiswa->nim }})</b></p>
        @elseif($user->role == 'dokter' && $dokter != null)
        <h3><i>{{$user->username}}</i> - ({{ $user->role }})</h3>
        <p class="mt-3">Status: Terhubung dengan <b>{{$dokter->nama}}</b></p>
        @elseif($user->role == 'petugas' && $petugas_asrama != null)
        <h3><i>{{$user->username}}</i> - ({{ $user->role }})</h3>
        <p class="mt-3">Status: Terhubung dengan <b>{{$petugas_asrama->nama}}</b></p>
        @else
        <h3><b><i>{{$user->username}}</i></b> - ({{ $user->role }})</h3>
        <h3></h3>
        <p><b>Status :</b> <i>Belum Terhubung</i> </p>
        @endif
        <a href="/admin/users" class="btn btn-success"><span data-feather="skip-back"></span></a>
        <a href="/admin/users/{{$user->id}}/edit" class="btn btn-warning"><span data-feather="edit-2"></span></a>
        <form action="/admin/users/{{$user->id}}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button class="btn btn-danger text-decoration-none" onclick="return confirm('Yakin ingin menghapus?')"><span data-feather="trash"></span></button>
        </form>

      </div>
    </div>
  </div>

  @endsection