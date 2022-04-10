@extends('layouts.main')

@section('container') 

<div class="container mt-5  ">

  @if(session()->has('success-change'))
      <div class="alert alert-success col-lg-3" role="alert">
        {{ session('success-change') }}
      </div>
      @elseif(session()->has('success-edit'))
      <div class="alert alert-warning col-lg-3" role="alert">
        {{ session('success-edit') }}
      </div>
      @elseif(session()->has('success-delete'))
      <div class="alert alert-danger col-lg-3" role="alert">
        {{ session('success-delete') }}
      </div>
      @endif

  <div class="accordion mt-5 mb-5" id="accordionPanelsStayOpenExample">

    <div class="accordion-item">

      <h2 class="accordion-header" id="panelsStayOpen-headingOne">
        <button class="accordion-button bg-success text-white" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
          Profil
        </button>
      </h2>
      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
        <div class="accordion-body">
          <div class="row g-0">
            <div class="col-md-3">
              @if($pengurus->image)
              <div style="overflow:hidden;" class="mt-3 mb-3">
                <img class="" src="{{ asset('storage/' . $pengurus->image) }}" alt="profile-image" style="height: 350px;width:190px">
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
                  <label for="nim"><b>Nomor Pegawai Pengurus</b></label>
                  <p>{{ $pengurus->no_pegawai }}</p>
                </div>
                <div class="col-md-6">
                  <label for="Nama"><b>Nama</b></label>
                  <p>{{ $pengurus->nama }}</p>
                </div>
                <div class="col-md-6">
                  <label for="jabatan"><b>Jabatan</b></label>
                  <p>{{ $pengurus->jabatan }}</p>
                </div>
                <div class="col-md-6">
                  <label for="email"><b>Email</b></label>
                  <p>{{ $pengurus->email }}</p>
                </div>
                <div class="col-md-6">
                  <label for="nama_asrama"><b>Lokasi Asrama</b></label>
                  <p>{{ $pengurus->asrama->nama_asrama }}</p>
                </div>
                <div class="col-md-6">
                  <label for="jenis_asrama"><b>Jenis Asrama</b></label>
                  <p>{{ $pengurus->asrama->jenis_asrama }}</p>
                </div>
                <div class="col-md-3">
                  <label for="no_telp"><b>No Telepon</b></label>
                  <p>
                    @if($pengurus->no_telp)
                    0{{ $pengurus->no_telp }}
                    @else
                    -
                    @endif
                  </p>
                </div>
                
                <div>
                  <div class="col-md-6">
                    <p class="card-text"><small class="text-muted">Last updated {{ $pengurus->updated_at->diffForHumans() }}</small></p>
                    <a href="/petugas/profile/{{ $pengurus->id }}" class="btn btn-success text-white">Ubah Data</a>
                  </div>
                </div>
      
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>

  </div>

</div>


@endsection
