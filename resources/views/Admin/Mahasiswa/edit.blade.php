@extends('Admin.main')

@section('container-admin')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Mahasiswa: <i>{{ $mahasiswa->nama }}</i></h1>
</div>

<div class="col-lg-6">
  
  <form method="post" action="/admin/mahasiswas/{{$mahasiswa->nim}}" enctype="multipart/form-data" class="row g-3">
    @method('put')
    @csrf
    <div class="mb-2 col-md-6">
      <label for="nim" class="form-label"><b>Nomor Induk Mahasiswa</b></label>
      <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" required value="{{ $mahasiswa->nim }}">
      @error('nim')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2 col-md-6">
      <label for="nama" class="form-label"><b>Nama Mahasiswa</b></label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ $mahasiswa->nama }}">
      @error('nama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2 col-md-6">
      <label for="tanggal_lahir" class="form-label"><b>Tanggal Lahir</b></label>
      <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ $mahasiswa->tanggal_lahir }}">
      @error('tanggal_lahir')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2 col-md-6">
      <label for="angkatan" class="form-label"><b>Angkatan Mahasiswa</b></label>
      <input type="number" class="form-control @error('angkatan') is-invalid @enderror" id="angkatan" name="angkatan" required value="{{ $mahasiswa->angkatan }}">
      @error('angkatan')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2 col-md-6">
      <label for="prodi" class="form-label"><b>Program Studi</b></label>
      <select class="form-select" name="prodi" id="prodi">
        @if($mahasiswa->prodi == 'D3 - Teknologi Komputer')
        <option value="D3 - Teknologi Komputer" selected>D3 - Teknologi Komputer</option>
        <option value="D3 - Teknologi Informasi">D3 - Teknologi Informasi</option>
        <option value="S1 - Sistim Informasi">S1 - Sistim Informasi</option>
        <option value="S1 - Informatika">S1 - Informatika</option>
        <option value="S1 - Elektro">S1 - Elektro</option>
        <option value="S1 - Manajemen Rekayasa">S1 - Manajemen Rekayasa</option>
        <option value="S1 - Bioproses">S1 - Bioproses</option>
        @elseif($mahasiswa->prodi == 'D3 - Teknologi Informasi')
        <option value="D3 - Teknologi Komputer" >D3 - Teknologi Komputer</option>
        <option value="D3 - Teknologi Informasi"selected>D3 - Teknologi Informasi</option>
        <option value="S1 - Sistim Informasi">S1 - Sistim Informasi</option>
        <option value="S1 - Informatika">S1 - Informatika</option>
        <option value="S1 - Elektro">S1 - Elektro</option>
        <option value="S1 - Manajemen Rekayasa">S1 - Manajemen Rekayasa</option>
        <option value="S1 - Bioproses">S1 - Bioproses</option>
        @elseif($mahasiswa->prodi == 'S1 - Sistim Informasi')
        <option value="D3 - Teknologi Komputer" >D3 - Teknologi Komputer</option>
        <option value="D3 - Teknologi Informasi">D3 - Teknologi Informasi</option>
        <option value="S1 - Sistim Informasi"selected>S1 - Sistim Informasi</option>
        <option value="S1 - Informatika">S1 - Informatika</option>
        <option value="S1 - Elektro">S1 - Elektro</option>
        <option value="S1 - Manajemen Rekayasa">S1 - Manajemen Rekayasa</option>
        <option value="S1 - Bioproses">S1 - Bioproses</option>
        @elseif($mahasiswa->prodi == 'S1 - Informatika')
        <option value="D3 - Teknologi Komputer" >D3 - Teknologi Komputer</option>
        <option value="D3 - Teknologi Informasi">D3 - Teknologi Informasi</option>
        <option value="S1 - Sistim Informasi">S1 - Sistim Informasi</option>
        <option value="S1 - Informatika"selected>S1 - Informatika</option>
        <option value="S1 - Elektro">S1 - Elektro</option>
        <option value="S1 - Manajemen Rekayasa">S1 - Manajemen Rekayasa</option>
        <option value="S1 - Bioproses">S1 - Bioproses</option>
        @elseif($mahasiswa->prodi == 'S1 - Elektro')
        <option value="D3 - Teknologi Komputer" >D3 - Teknologi Komputer</option>
        <option value="D3 - Teknologi Informasi">D3 - Teknologi Informasi</option>
        <option value="S1 - Sistim Informasi">S1 - Sistim Informasi</option>
        <option value="S1 - Informatika">S1 - Informatika</option>
        <option value="S1 - Elektro"selected>S1 - Elektro</option>
        <option value="S1 - Manajemen Rekayasa">S1 - Manajemen Rekayasa</option>
        <option value="S1 - Bioproses">S1 - Bioproses</option>
        @elseif($mahasiswa->prodi == 'S1 - Manajemen Rekayasa')
        <option value="D3 - Teknologi Komputer" >D3 - Teknologi Komputer</option>
        <option value="D3 - Teknologi Informasi">D3 - Teknologi Informasi</option>
        <option value="S1 - Sistim Informasi">S1 - Sistim Informasi</option>
        <option value="S1 - Informatika">S1 - Informatika</option>
        <option value="S1 - Elektro">S1 - Elektro</option>
        <option value="S1 - Manajemen Rekayasa" selected>S1 - Manajemen Rekayasa</option>
        <option value="S1 - Bioproses">S1 - Bioproses</option>
        @elseif($mahasiswa->prodi == 'S1 - Bioproses')
        <option value="D3 - Teknologi Komputer" >D3 - Teknologi Komputer</option>
        <option value="D3 - Teknologi Informasi">D3 - Teknologi Informasi</option>
        <option value="S1 - Sistim Informasi">S1 - Sistim Informasi</option>
        <option value="S1 - Informatika">S1 - Informatika</option>
        <option value="S1 - Elektro">S1 - Elektro</option>
        <option value="S1 - Manajemen Rekayasa" >S1 - Manajemen Rekayasa</option>
        <option value="S1 - Bioproses"selected>S1 - Bioproses</option>
        @else
        <option value="" >Pilih</option>
        <option value="D3 - Teknologi Komputer" >D3 - Teknologi Komputer</option>
        <option value="D3 - Teknologi Informasi">D3 - Teknologi Informasi</option>
        <option value="S1 - Sistim Informasi">S1 - Sistim Informasi</option>
        <option value="S1 - Informatika">S1 - Informatika</option>
        <option value="S1 - Elektro">S1 - Elektro</option>
        <option value="S1 - Manajemen Rekayasa" >S1 - Manajemen Rekayasa</option>
        <option value="S1 - Bioproses">S1 - Bioproses</option>
        @endif
      </select>
      @error('prodi')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2 col-md-6">
      <label for="asrama" class="form-label"><b>Asrama </b></label>
      <select class="form-select" name="asrama_id" id="asrama_id">
        @foreach($asramas as $asrama)
          @if($mahasiswa->asrama_id == $asrama->id)
            <option value="{{ $asrama->id }}" selected>{{ $asrama->nama_asrama }}</option>
          @else
            <option value="{{ $asrama->id }}">{{ $asrama->nama_asrama }}</option>
          @endif
        @endforeach
      </select>
    </div>
    <div class="mb-2 col-md-6">
      <label for="email" class="form-label"><b>Email</b></label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ $mahasiswa->email }}">
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2 col-md-6">
      <label for="alamat" class="form-label"><b>Alamat Mahasiswa</b></label>
      <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $mahasiswa->alamat }}">
      @error('alamat')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2 col-md-6">
      <label for="no_telp" class="form-label"><b><b>No Telepon Mahasiswa</b></b></label>
      <div class="input-group mb-2">
        <span class="input-group-text" id="basic-addon1">62</span>
        <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ $mahasiswa->no_telp }}" placeholder="81234567890">
        @error('no_telp')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>
    <div class="mb-2">
      <label for="image" class="form-label"><b><b>Foto Mahasiswa</b></b></label>
      <input type="hidden" name="oldimage" id="oldimage" value="{{ $mahasiswa->image }}">
      @if($mahasiswa->image)
      <img src="{{ asset('storage/'.$mahasiswa->image) }}" class="img-preview img-fluid mb-2 col-md-6 d-block">
      @else
      <img class="img-preview img-fluid mb-2 col-md-6">
      @endif
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary mb-3 mt-3">Ubah Mahasiswa</button>
  </form>

  <script>
    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');
  
      imgPreview.style.display = 'block';
  
      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);
  
      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }

  </script>
</div>

@endsection
