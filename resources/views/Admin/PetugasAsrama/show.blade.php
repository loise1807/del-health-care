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

<div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-12">
        
        @if(!$petugas_asrama->user)
        <h3 class="mb-3">{{$petugas_asrama->nama}}</h3>
        @else
        <h3 class="mb-3">{{$petugas_asrama->user->username}} - {{$petugas_asrama->nama}}</h3>
        @endif

        <div class="card mb-3 border-5 border-secondary" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4 mt-1">
              @if($petugas_asrama->image)
              <div style="overflow:hidden;">
                <img class="" src="{{ asset('storage/' . $petugas_asrama->image) }}" alt="profile-image" style="height: 350px;width:190px">
              </div>
              @else
              <div style="max-height: 300px; max-width:200px; overflow:hidden;">
                <img class="" src="https://source.unsplash.com/200x500?people" alt="profile-image">
              </div>
              @endif
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{$petugas_asrama->no_pegawai}} - {{$petugas_asrama->nama}}</h5>
                <div class="row g-2">
                  <label for="prodi" class="col-md-4"><b>Lokasi Asrama</b></label>
                  <p for="prodi" class="col-md-8">: {{$petugas_asrama->asrama->nama_asrama}}</p>

                  <label for="angkatan" class="col-md-4"><b>Jabatan</b></label>
                  <p for="angkatan" class="col-md-8">: {{$petugas_asrama->jabatan}}</p>

                  <label for="email" class="col-md-4"><b>Email</b></label>
                  <p for="email" class="col-md-8">: {{$petugas_asrama->email}}</p>


                  @if($petugas_asrama->no_telp)
                  <label for="no_telp" class="col-md-4"><b>No Telepon</b></label>
                  <p for="no_telp" class="col-md-8">: <a href="https://wa.me/62{{$petugas_asrama->no_telp}}?text=Halo%20{{$petugas_asrama->nama}}%0ASaya%20admin%20dari%20Del%20Health%20Care" target="_blank"> 0{{$petugas_asrama->no_telp}} </a></p>
                  @else
                  <label for="no_telp" class="col-md-4"><b>No Telepon</b></label>
                  <p for="no_telp" class="col-md-8">: - </a></p>
                  @endif

                </div>
                <a href="/admin/petugas_asramas" class="btn btn-success"><span data-feather="skip-back"></span></a>
                <a href="/admin/petugas_asramas/{{$petugas_asrama->no_pegawai}}/edit" class="btn btn-warning"><span data-feather="edit-2"></span></a>
                <form action="/admin/petugas_asramas/{{$petugas_asrama->no_pegawai}}" method="POST" class="d-inline">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><span data-feather="trash"></span></button>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  @endsection