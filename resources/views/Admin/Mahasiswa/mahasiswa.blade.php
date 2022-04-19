@extends('Admin.main')

@section('container-admin')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Mahasiswa</h1>
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
      <a href="/admin/mahasiswas/create" class="btn btn-success mb-3">Tambah Mahasiswa</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NIM</th>
              <th scope="col">Nama</th>
              <th scope="col">email</th>
              <th scope="col">Prodi</th>
              <th scope="col">Angkatan</th>
              <th scope="col">Alamat</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($mahasiswas as $mahasiswa)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$mahasiswa->nim}}</td>
              <td>{{$mahasiswa->nama}}</td>
              <td>{{$mahasiswa->email}}</td>
              <td>{{$mahasiswa->prodi}}</td>
              <td>{{$mahasiswa->angkatan}}</td>
              <td>{{$mahasiswa->alamat}}</td>
              <td>{{date('d - M - Y', strtotime($mahasiswa->tanggal_lahir))}}</td>
              <td>
                <a href="/admin/mahasiswas/{{$mahasiswa->nim}}" class="badge bg-secondary"><span data-feather="eye"></span></a>
                <a href="/admin/mahasiswas/{{$mahasiswa->nim}}/edit" class="badge bg-warning"><span data-feather="edit-2"></span></a>
                <form action="/admin/mahasiswas/{{$mahasiswa->nim}}" method="POST" class="d-inline">
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