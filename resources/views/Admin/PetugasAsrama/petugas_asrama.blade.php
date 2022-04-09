@extends('Admin.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengurus Asrama</h1>
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
      <a href="/admin/petugas_asramas/create" class="btn btn-success mb-3">Tambah Pengurus Asrama</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">No Pegawai</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Lokasi Asrama</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($petugas_asramas as $petugas)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$petugas->no_pegawai}}</td>
              <td>{{$petugas->nama}}</td>
              <td>{{$petugas->email}}</td>
              <td>{{$petugas->jabatan}}</td>
              <td>{{$petugas->nama_asrama}}</td>
              <td>
                <a href="/admin/petugas_asramas/{{$petugas->no_pegawai}}" class="badge bg-secondary"><span data-feather="eye"></span></a>
                <a href="/admin/petugas_asramas/{{$petugas->no_pegawai}}/edit" class="badge bg-warning"><span data-feather="edit-2"></span></a>
                <form action="/admin/petugas_asramas/{{$petugas->no_pegawai}}" method="POST" class="d-inline">
                  @method('DELETE')
                  @csrf
                  <button class="badge bg-danger text-decoration-none border-0" onclick="return confirm('Yakin ingin menghapus?')"><span data-feather="trash"></span></button>
                </form>
              </td>
            </tr>
            @endforeach
            {{-- @foreach($petugas_asramas as $mahasiswa)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$mahasiswa->username}}</td>
              <td>{{$mahasiswa->nim}}</td>
              <td>{{$mahasiswa->nama}}</td>
              <td>{{$mahasiswa->email}}</td>
              <td>{{$mahasiswa->prodi}}</td>
              <td>{{$mahasiswa->angkatan}}</td>
              <td>{{$mahasiswa->alamat}}</td>
              <td>{{date('d - M - Y', strtotime($mahasiswa->tanggal_lahir))}}</td>
              
            </tr>
            @endforeach --}}
          </tbody>
        </table>
      </div>
@endsection