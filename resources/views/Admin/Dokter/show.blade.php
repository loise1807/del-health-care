@extends('Admin.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-12">
        
        @if(!$dokter->user)
        <h3 class="mb-3">{{$dokter->nama}}</h3>
        @else
        <h3 class="mb-3">{{$dokter->user->username}} - {{$dokter->nama}}</h3>
        @endif
        
        <div class="card mb-3 border-5 border-secondary" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4 mt-1">
              @if($dokter->image)
              <div style="overflow:hidden;">
                <img class="" src="{{ asset('storage/' . $dokter->image) }}" alt="profile-image" style="height: 350px;width:190px">
              </div>
              @else
              <div style="max-height: 300px; max-width:200px; overflow:hidden;">
                <img class="" src="https://source.unsplash.com/200x500?people" alt="profile-image">
              </div>
              @endif
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{$dokter->no_pegawai_dokter}} - {{$dokter->nama}}</h5>
                <div class="row g-2">

                  <label for="spesialis" class="col-md-4"><b>Spesialis</b></label>
                  <p for="spesialis" class="col-md-8">: {{$dokter->spesialis}}</p>

                  <label for="email" class="col-md-4"><b>Email</b></label>
                  <p for="email" class="col-md-8">: {{$dokter->email}}</p>


                  @if($dokter->no_telp)
                  <label for="no_telp" class="col-md-4"><b>No Telepon</b></label>
                  <p for="no_telp" class="col-md-8">: <a href="https://wa.me/62{{$dokter->no_telp}}?text=Halo%20{{$dokter->nama}}%0ASaya%20admin%20dari%20Del%20Health%20Care" target="_blank"> 0{{$dokter->no_telp}} </a></p>
                  @else
                  <label for="no_telp" class="col-md-4"><b>No Telepon</b></label>
                  <p for="no_telp" class="col-md-8">: - </a></p>
                  @endif

                </div>
                <a href="/admin/dokters" class="btn btn-success"><span data-feather="skip-back"></span></a>
                <a href="/admin/dokters/{{$dokter->no_pegawai_dokter}}/edit" class="btn btn-warning"><span data-feather="edit-2"></span></a>
                <form action="/admin/dokters/{{$dokter->no_pegawai_dokter}}" method="POST" class="d-inline">
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