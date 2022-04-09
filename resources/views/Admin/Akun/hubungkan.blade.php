@extends('Admin.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Hubungkan akun {{ $user->role }}</h1>
</div>

<div class="col-lg-6">
  
  <form method="post" action="/admin/users/{{$user->id}}">
    @method('put')
    @csrf
    <input type="hidden" name="aksi" id="aksi" value="hubungkan">
    <input type="hidden" name="id_akun" id="id_akun" value="{{$user->id}}">
    <input type="hidden" name="role" id="role" value="{{$user->role}}">
    <div class="mb-3">
      <h5>Username</h5>
      <p>{{ $user->username }}</p>
    </div>
    <div class="mb-3">
      <label for="id_user" class="form-label">Hubungkan dengan</label>
      <select class="form-select" name="id_user" id="id_user">
        @if($user->role == 'dokter')
          @foreach($dokters as $dokter)
          <option value="{{ $dokter->id }}">
            {{ $dokter->nama }}
          </option>
          @endforeach
        @endif
        @if($user->role == 'mahasiswa')
          @foreach($mahasiswas as $mahasiswa)
          <option value="{{ $mahasiswa->id }}">
            {{ $mahasiswa->nama }}
          </option>
          @endforeach
        @endif
        @if($user->role == 'petugas')
          @foreach($petugas_asramas as $petugas_asrama)
          <option value="{{ $petugas_asrama->id }}">
            {{ $petugas_asrama->nama }}
          </option>
          @endforeach
        @endif
      </select>
      @error('id_user')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Hubungkan Akun</button>
  </form>

</div>

@endsection
