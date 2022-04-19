@extends('Admin.main')

@section('container') 


<div class="page-inner">

</div>
<!---->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Beranda</a>
    </li>
    <li class="breadcrumb-item active">Konsultasi</li>
</ol>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Pengurus Asrama: <i>{{ $petugas_asrama->nama }}</i></h1>
</div>

<div class="col-lg-11">
  
  <form method="post" action="/admin/petugas_asramas/{{$petugas_asrama->no_pegawai}}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="row g-2">
      <div class="mb-3 col-lg-6">
        <label for="no_pegawai" class="form-label">Nomor Pegawai</label>
        <input type="text" class="form-control @error('no_pegawai') is-invalid @enderror" id="no_pegawai" name="no_pegawai" required value="{{ $petugas_asrama->no_pegawai }}">
        @error('no_pegawai')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-lg-6">
        <label for="nama" class="form-label">Nama Pengurus</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ $petugas_asrama->nama }}">
        @error('nama')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 col-md-6">
        <label for="email" class="form-label"><b>Email</b></label>
        <div class="input-group mb-2">
          <span class="input-group-text" id="basic-addon-email">@</span>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ $petugas_asrama->email }}">
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 col-md-6">
        <label for="no_telp" class="form-label"><b>No Telepon</b></label>
        <div class="input-group mb-2">
          <span class="input-group-text" id="basic-addon-no">+62</span>
          <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ $petugas_asrama->no_telp }}" placeholder="81234567890">
          @error('no_telp')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 col-md-6">
        <label for="asrama" class="form-label">Asrama </label>
        <select class="form-select" name="asrama_id" id="asrama_id">
          @foreach($asramas as $asrama)
            @if($petugas_asrama->asrama_id == $asrama->id)
              <option value="{{ $asrama->id }}" selected>{{ $asrama->nama_asrama }}</option>
            @else
              <option value="{{ $asrama->id }}">{{ $asrama->nama_asrama }}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="mb-3 col-md-6">
        <label for="jabatan" class="form-label">Jabatan Pengurus</label>
        <select class="form-select" name="jabatan" id="jabatan">
          @if($petugas_asrama->jabatan == 'Bapak Asrama')
          <option value="Bapak Asrama" selected>Bapak Asrama</option>
          <option value="Ibu Asrama">Ibu Asrama</option>
          <option value="Abang Asrama">Abang Asrama</option>
          <option value="Kakak Asrama">Kakak Asrama</option>
          @elseif($petugas_asrama->jabatan == 'Ibu Asrama')
          <option value="Bapak Asrama">Bapak Asrama</option>
          <option value="Ibu Asrama" selected>Ibu Asrama</option>
          <option value="Abang Asrama">Abang Asrama</option>
          <option value="Kakak Asrama">Kakak Asrama</option>
          @elseif($petugas_asrama->jabatan == 'Abang Asrama')
          <option value="Bapak Asrama">Bapak Asrama</option>
          <option value="Ibu Asrama">Ibu Asrama</option>
          <option value="Abang Asrama" selected>Abang Asrama</option>
          <option value="Kakak Asrama">Kakak Asrama</option>
          @elseif($petugas_asrama->jabatan == 'Kakak Asrama')
          <option value="Bapak Asrama">Bapak Asrama</option>
          <option value="Ibu Asrama">Ibu Asrama</option>
          <option value="Abang Asrama">Abang Asrama</option>
          <option value="Kakak Asrama" selected>Kakak Asrama</option>
          @else
          <option value="" selected>Pilih</option>
          <option value="Bapak Asrama">Bapak Asrama</option>
          <option value="Ibu Asrama">Ibu Asrama</option>
          <option value="Abang Asrama">Abang Asrama</option>
          <option value="Kakak Asrama">Kakak Asrama</option>
          @endif
        </select>
        @error('jabatan')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2">
        <label for="image" class="form-label"><b><b>Foto Pengurus</b></b></label>
        <input type="hidden" name="oldimage" id="oldimage" value="{{ $petugas_asrama->image }}">
        @if($petugas_asrama->image)
        <img src="{{ asset('storage/'.$petugas_asrama->image) }}" class="img-preview img-fluid mb-2 col-md-6 d-block">
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
    </div>
    <button type="submit" class="btn btn-primary mb-3 mt-3">Ubah Data Pengurus</button>
  </form>

</div>

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

@endsection
