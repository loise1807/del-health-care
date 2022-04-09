@extends('Admin.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-12">
        
        <div class="card mb-3 border-5 border-secondary" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-4 mt-1">
              @if($mahasiswa->image)
              <div style="overflow:hidden;">
                <img class="" src="{{ asset('storage/' . $mahasiswa->image) }}" alt="profile-image" style="height: 350px;width:190px">
              </div>
              @else
              <div style="max-height: 300px; max-width:200px; overflow:hidden;">
                <img class="" src="https://source.unsplash.com/200x500?people" alt="profile-image">
              </div>
              @endif
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">{{$mahasiswa->nim}} - {{$mahasiswa->nama}}</h5>
                <div class="row g-2">
                  <label for="prodi" class="col-md-4"><b>Program Studi</b></label>
                  <p for="prodi" class="col-md-8">: {{$mahasiswa->prodi}}</p>

                  <label for="angkatan" class="col-md-4"><b>Angkatan</b></label>
                  <p for="angkatan" class="col-md-8">: {{$mahasiswa->angkatan}}</p>

                  <label for="email" class="col-md-4"><b>Email</b></label>
                  <p for="email" class="col-md-8">: {{$mahasiswa->email}}</p>

                  @if($mahasiswa->alamat)
                  <label for="tanggal_lahir" class="col-md-4"><b>Tanggal Lahir</b></label>
                  <p for="tanggal_lahir" class="col-md-8">: {{date('d - M - Y', strtotime($mahasiswa->tanggal_lahir))}}</p>
                  @else
                  <label for="tanggal_lahir" class="col-md-4"><b>Tanggal Lahir</b></label>
                  <p for="tanggal_lahir" class="col-md-8">: -</p>
                  @endif

                  @if($mahasiswa->alamat)
                  <label for="alamat" class="col-md-4"><b>Alamat</b></label>
                  <p for="alamat" class="col-md-8">: {{$mahasiswa->alamat}}</p>
                  @else
                  <label for="alamat" class="col-md-4"><b>Alamat</b></label>
                  <p for="alamat" class="col-md-8">: -</p>
                  @endif


                  @if($mahasiswa->no_telp)
                  <label for="no_telp" class="col-md-4"><b>No Telepon</b></label>
                  <p for="no_telp" class="col-md-8">: <a href="https://wa.me/62{{$mahasiswa->no_telp}}?text=Halo%20{{$mahasiswa->nama}}%0ASaya%20admin%20dari%20Del%20Health%20Care" target="_blank"> 0{{$mahasiswa->no_telp}} </a></p>
                  @else
                  <label for="no_telp" class="col-md-4"><b>No Telepon</b></label>
                  <p for="no_telp" class="col-md-8">: - </a></p>
                  @endif

                </div>
                <a href="/admin/mahasiswas" class="btn btn-success col-md-3"><span data-feather="skip-back"></span></a> &nbsp
                <a href="/admin/mahasiswas/{{$mahasiswa->nim}}/edit" class="btn btn-warning col-md-3"><span data-feather="edit-2"></span></a>
                <form action="/admin/mahasiswas/{{$mahasiswa->nim}}" method="POST" class="d-inline">
                  @method('DELETE')
                  @csrf
                  <button class="btn btn-danger text-decoration-none col-md-3" onclick="return confirm('Yakin ingin menghapus?')"><span data-feather="trash"></span></button>
                </form>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>

  @endsection