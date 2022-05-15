@extends('layouts.main-toon')

@section('container') 


<div class="page-inner">

</div>
<!---->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="/">Beranda</a>
    </li>
    <li class="breadcrumb-item active">{{ $title }}</li>
</ol>

<div class="container col-lg-10">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Semua Notifikasi</h1>
  </div>

  @if(session()->has('success-create'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success-create') }}
  </div>
  @elseif(session()->has('success-edit'))
  <div class="alert alert-warning col-lg-8" role="alert">
    {{ session('success-edit') }}
  </div>
  @elseif(session()->has('success-delete'))
  <div class="alert alert-danger col-lg-8" role="alert">
    {{ session('success-delete') }}
  </div>
  @endif
  
  @if($notifikasis->count() == 0)
    <div class="alert alert-danger col-lg-8" role="alert">
      Anda tidak memiliki notifikasi
    </div>
  @else
  <form action="/notifikasi/{{auth()->user()->id}}/hapus_semua" method="post" class="d-inline">
    @method('put')
    @csrf
    <button class="btn btn-danger">Hapus Semua Notifikasi</button>
  </form>
  <div class="row">
  @foreach($notifikasis as $notifikasi)
    <div class="col-sm-6 m b-2">
      <div class="card" style="background: linear-gradient(to bottom, rgb(255, 255, 255) 20%, {{ $notifikasi->bgcolor }} 100%);">
        <div class="card-body">
          <h5 class="card-title">{{ $notifikasi->judul }}</h5>
          <p class="card-text"><h6>{{ $notifikasi->isi }}</h6></p>
            @if ($notifikasi->status == 1)
            <form action="/notifikasi/{{$notifikasi->id}}/belum_dibaca" method="post" class="d-inline">
              @method('put')
              @csrf
              <button class="btn btn-secondary">Tandai Belum Dibaca</button>
            </form>
            @else
            <form action="/notifikasi/{{$notifikasi->id}}/telah_dibaca" method="post" class="d-inline">
              @method('put')
              @csrf
              <button class="btn btn-success">Tandai Telah Dibaca</button>
            </form>
            @endif
            <form action="/notifikasi/{{$notifikasi->id}}" method="POST" class="d-inline">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger text-decoration-none border-0" onclick="return confirm('Yakin ingin menghapus?')">Hapus <i class="bi bi-trash3-fill"></i></button>
            </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @endif
  
</div>

@endsection