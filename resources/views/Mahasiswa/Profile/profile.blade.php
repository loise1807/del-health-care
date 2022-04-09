@extends('layouts.main')

@section('container') 

<div class="container mt-5  ">
  <div class="card mb-3 col-md-12">
    <div class="row g-0">
      <div class="col-md-3">
        @if($mahasiswa->image)
        <div style="overflow:hidden;" class="mt-3 mb-3">
          <img class="" src="{{ asset('storage/' . $mahasiswa->image) }}" alt="profile-image" style="height: 350px;width:190px">
        </div>
        @else
        <div style="max-height: 300px; max-width:200px; overflow:hidden;">
          <img class="" src="https://source.unsplash.com/190x350?people" alt="profile-image">
        </div>
        @endif
      </div>
      <div class="col-md-6">
        <div class="card-body row g-2">
          <div class="col-md-6">
            <label for="nim"><b>Nomor Induk Mahasiswa</b></label>
            <p>{{ $mahasiswa->nim }}</p>
          </div>
          <div class="col-md-6">
            <label for="Nama"><b>Nama</b></label>
            <p>{{ $mahasiswa->nama }}</p>
          </div>
          <div class="col-md-6">
            <label for="angkatan"><b>Angkatan</b></label>
            <p>{{ $mahasiswa->angkatan }}</p>
          </div>
          <div class="col-md-6">
            <label for="email"><b>Email</b></label>
            <p>{{ $mahasiswa->email }}</p>
          </div>
          <div class="col-md-6">
            <label for="nama_asrama"><b>Lokasi Asrama</b></label>
            <p>{{ $mahasiswa->asrama->nama_asrama }}</p>
          </div>
          <div class="col-md-6">
            <label for="jenis_asrama"><b>Jenis Asrama</b></label>
            <p>{{ $mahasiswa->asrama->jenis_asrama }}</p>
          </div>
          <div class="col-md-3">
            <label for="tanggal_lahir"><b>Tanggal Lahir</b></label>
            <p>
              @if($mahasiswa->tanggal_lahir)
              {{ $mahasiswa->tanggal_lahir }}
              @else
              -
              @endif
            </p>
          </div>
          <div class="col-md-3">
            <label for="no_telp"><b>No Telepon</b></label>
            <p>
              @if($mahasiswa->no_telp)
              {{ $mahasiswa->no_telp }}
              @else
              -
              @endif
            </p>
          </div>
          <div class="col-md-3">
            <label for="alamat"><b>Alamat</b></label>
            <p>
              @if($mahasiswa->alamat)
              {{ $mahasiswa->alamat }}
              @else
              -
              @endif
            </p>
          </div>

          
          <div>
            <div class="col-md-6">
              <p class="card-text"><small class="text-muted">Last updated {{ $mahasiswa->updated_at->diffForHumans() }}</small></p>
              <a href="" class="btn btn-success text-dark">Ubah Data</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>


@endsection
