@extends('Admin.main')

@section('container-admin')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Akun</h1>
</div>

<div class="col-lg-6">
  
  <form method="post" action="/admin/users">
    @csrf
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username') }}">
      @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus value="{{ old('password') }}">
      @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="repassword" class="form-label">Re-password</label>
      <input type="password" class="form-control @error('repassword') is-invalid @enderror" id="repassword" name="repassword" required autofocus>
      @error('repassword')
      @if('repassword' != 'password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @endif
      @enderror
    </div>
    <div class="mb-3">
      <label for="role" class="form-label">Role</label>
      <select class="form-select" name="role" id="role">
            <option value="admin" selected>Admin</option>
            <option value="dokter">Dokter</option>
            <option value="petugas">Pengurus Asrama</option>
            <option value="mahasiswa">Mahasiswa</option>
      </select>
      @error('role')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Buat Akun</button>
    
  </form>

</div>

@endsection
