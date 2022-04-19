@extends('Admin.main')

@section('container-admin')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dokter</h1>
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

      <div class="table-responsive col-lg-12">
      <a href="/admin/dokters/create" class="btn btn-success mb-3">Tambah Dokter</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">No. Pegawai</th>
              <th scope="col">Email</th>
              <th scope="col">Nama</th>
              <th scope="col">Spesialis</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dokters as $dokter)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$dokter->no_pegawai_dokter}}</td>
              <td>{{$dokter->email}}</td>
              <td>{{$dokter->nama}}</td>
              <td>{{$dokter->spesialis}}</td>
              <td>
                <a href="/admin/dokters/{{$dokter->no_pegawai_dokter}}" class="badge bg-secondary"><span data-feather="eye"></span></a>
                <a href="/admin/dokters/{{$dokter->no_pegawai_dokter}}/edit" class="badge bg-warning"><span data-feather="edit-2"></span></a>
                <form action="/admin/dokters/{{$dokter->no_pegawai_dokter}}" method="POST" class="d-inline">
                  @method('DELETE')
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