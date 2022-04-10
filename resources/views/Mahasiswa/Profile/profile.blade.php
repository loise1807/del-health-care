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
                    0{{ $mahasiswa->no_telp }}
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
                    <a href="/mahasiswa/profile/{{ $mahasiswa->id }}" class="btn btn-success text-white">Ubah Data</a>
                  </div>
                </div>
      
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
        <button class="accordion-button collapsed  bg-success text-white" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
          Asrama
        </button>
      </h2>
      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
        <div class="accordion-body row g-2">
          <div class="col-md-6">
            <label for="nama_asrama"><b>Nama Asrama</b></label>
            <p>
              {{ $asrama->nama_asrama }} ({{ $asrama->jenis_asrama }})
            </p>
          </div>
          <div class="col-md-6">
            <label for="alamat_asrama"><b>Alamat Asrama</b></label>
            <p>
              {{ $asrama->alamat_asrama }}
            </p>
          </div>
          <div class="col-md-6">
            <label for="nama"><b>Nama Pengurus</b></label>
            <p>
              {{ $petugas_asrama->nama }} ({{ $petugas_asrama->jabatan}})
            </p>
          </div>
          <div class="col-md-6">
            <label for="no_telp"><b>No Telepon</b></label>
              @if($petugas_asrama->no_telp)
              @if($petugas_asrama->jabatan == 'Abang Asrama' || $petugas_asrama->jabatan == 'Bapak Asrama')
              <p for="no_telp"><a href="https://wa.me/62{{$petugas_asrama->no_telp}}?text=Selamat%20Pagi%2FSiang%2FMalam%20kepada%20Bapak%20{{$petugas_asrama->nama}}%20Mohon%20maaf%20mengganggu%20waktunya.%20Saya%20{{$mahasiswa->nama}}%20program%20studi%20{{$mahasiswa->prodi}}%20angkatan%20{{$mahasiswa->angkatan}}%20ingin%20menyampaikan%20" target="_blank"> 0{{$petugas_asrama->no_telp}} </a></p>
              @else
              <p for="no_telp"><a href="https://wa.me/62{{$petugas_asrama->no_telp}}?text=Selamat%20Pagi%2FSiang%2FMalam%20kepada%20Ibu%20{{$petugas_asrama->nama}}%20Mohon%20maaf%20mengganggu%20waktunya.%20Saya%20{{$mahasiswa->nama}}%20program%20studi%20{{$mahasiswa->prodi}}%20angkatan%20{{$mahasiswa->angkatan}}%20ingin%20menyampaikan%20" target="_blank"> 0{{$petugas_asrama->no_telp}} </a></p>
              @endif
              @else
              <p for="no_telp">- </p>
              @endif
          </div>
        </div>
      </div>
    </div>

  </div>

</div>


@endsection
