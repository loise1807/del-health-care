@extends('Admin.main')

@section('container-admin')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Asrama</h1>
</div>

<div class="col-lg-6">
  
  <form method="post" action="/admin/asramas/{{$asrama->id}}">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="nama_asrama" class="form-label">Nama Asrama </label>
      <input type="text" class="form-control @error('nama_asrama') is-invalid @enderror" id="nama_asrama" name="nama_asrama" required autofocus value="{{ $asrama->nama_asrama }}">
      @error('nama_asrama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="jenis_asrama" class="form-label">Jenis Asrama</label>
      <select class="form-select" name="jenis_asrama" id="jenis_asrama">
        @if($asrama->jenis_asrama == 'Asrama Putri')
        <option value="{{ $asrama->jenis_asrama}}" selected>{{ $asrama->jenis_asrama }}</option>
        <option value="Asrama Putra">Asrama Putra</option>
        @elseif($asrama->jenis_asrama == 'Asrama Putra')
        <option value="{{ $asrama->jenis_asrama}}" selected>{{ $asrama->jenis_asrama }}</option>
        <option value="Asrama Putri">Asrama Putri</option>
        @else
        <option value="Asrama Putri">Asrama Putri</option>
        <option value="Asrama Putra">Asrama Putra</option>
        @endif
      </select>
      @error('jenis_asrama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  <div class="mb-3">
    <label for="lokasi_asrama" class="form-label">Lokasi Asrama</label>
    <select class="form-select" name="lokasi_asrama" id="lokasi_asrama">
      @if($asrama->lokasi_asrama == 'Luar Kampus')
      <option value="Luar Kampus" selected>Luar Kampus</option>
      <option value="Dalam Kampus">Dalam Kampus</option>
      @elseif($asrama->lokasi_asrama == 'Dalam Kampus')
      <option value="Dalam Kampus" selected>Dalam Kampus</option>
      <option value="Luar Kampus">Luar Kampus</option>
      @else
      <option value="Dalam Kampus">Dalam Kampus</option>
      <option value="Luar Kampus">Luar Kampus</option>
      @endif
      </select>
      @error('lokasi_asrama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="alamat_asrama" class="form-label">Alamat Asrama </label>
      <input type="text" class="form-control @error('alamat_asrama') is-invalid @enderror" id="alamat_asrama" name="alamat_asrama" required autofocus value="{{ $asrama->alamat_asrama }}">
      @error('alamat_asrama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Ubah Asrama</button>
  </form>

</div>

@endsection
