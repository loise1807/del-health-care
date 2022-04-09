@extends('Admin.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit user</h1>
</div>

<div class="col-lg-6">
  
  <form method="post" action="/admin/users/{{$user->id}}">
    @method('put')
    @csrf
    <input type="hidden" name="aksi" id="aksi" value="edit">
    <div class="mb-3">
      <label for="username" class="form-label">Nama user </label>
      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ $user->username }}">
      @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="role" class="form-label">Role</label>
      <select class="form-select" name="role" id="role">
        @if($user->role == 'admin')
        <option value="{{ $user->role}}" selected>Admin</option>
        <option value="mahasiswa">Mahasiswa</option>
        <option value="dokter">Dokter</option>
        <option value="petugas">Pengurus Asrama</option>
        @elseif($user->role == 'mahasiswa')
        <option value="admin">Admin</option>
        <option value="{{ $user->role}}" selected>Mahasiswa</option>
        <option value="dokter">Dokter</option>
        <option value="petugas">Pengurus Asrama</option>
        @elseif($user->role == 'dokter')
        <option value="admin">Admin</option>
        <option value="mahasiswa">Mahasiswa</option>
        <option value="{{ $user->role}}" selected>Dokter</option>
        <option value="petugas">Pengurus Asrama</option>
        @elseif($user->role == 'petugas')
        <option value="admin">Admin</option>
        <option value="mahasiswa">Mahasiswa</option>
        <option value="dokter">Dokter</option>
        <option value="{{ $user->role}}" selected>Pengurus Asrama</option>
        @else
        <option value="admin" selected>Admin</option>
        <option value="mahasiswa">Mahasiswa</option>
        <option value="dokter">Dokter</option>
        <option value="petugas" >Pengurus Asrama</option>
        @endif
      </select>
      @error('role')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
    <div class="mb-3 col-sm-6">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password">
      <span style="color:red">Kosongkan jika tidak ingin mengubah</span>
      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3 col-sm-6">
      <label for="repassword" class="form-label">Re-Password</label>
      <input type="password" class="form-control @error('repassword') is-invalid @enderror" id="repassword" name="repassword">
      @error('repassword')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Ubah user</button>
  </form>

</div>

@endsection
