@extends('Admin.main')

@section('container-admin')

<div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-12">
        
        <h1 class="mb-3">{{$asrama->nama_asrama}}</h2>
        <p><b>Jenis Asrama  :</b> <i>{{$asrama->jenis_asrama}}</i> </p>
        <p><b>Lokasi Asrama :</b> <i>{{$asrama->lokasi_asrama}}</i> </p>
        <p><b>Alamat Asrama :</b> <i>{{$asrama->alamat_asrama}}</i> </p>

        <a href="/admin/asramas" class="btn btn-success"><span data-feather="skip-back"></span></a>
        <a href="" class="btn btn-warning"><span data-feather="edit-2"></span></a>
        <form action="/admin/asramas/{{$asrama->id}}" method="POST" class="d-inline">
          @method('DELETE')
          @csrf
          <button class="btn bg-danger text-decoration-none border-0" onclick="return confirm('Yakin ingin menghapus?')"><span data-feather="trash"></span></button>
        </form>

      </div>
    </div>
  </div>

  @endsection