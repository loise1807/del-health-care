@extends('Admin.main')

@section('container-admin')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Asrama</h1>
      </div>

      @if(session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
      </div>
      @endif

      <div class="table-responsive col-lg-10">
      <a href="/admin/asramas/create" class="btn btn-primary mb-3">Tambah Asrama</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Asrama</th>
              <th scope="col">Jenis Asrama</th>
              <th scope="col">Lokasi Asrama</th>
              <th scope="col">Alamat Asrama</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($asramas as $asrama)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$asrama->nama_asrama}}</td>
              <td>{{$asrama->jenis_asrama}}</td>
              <td>{{$asrama->lokasi_asrama}}</td>
              <td>{{$asrama->alamat_asrama}}</td>
              <td>
                <a href="/admin/asramas/{{$asrama->id}}" class="badge bg-success"><span data-feather="eye"></span></a>
                <a href="/admin/asramas/{{$asrama->id}}/edit" class="badge bg-warning"><span data-feather="edit-2"></span></a>
                <form action="/admin/asramas/{{$asrama->id}}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger text-decoration-none border-0" onclick="return confirm('Yakin ingin menghapus?')"><span data-feather="trash"></span></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection