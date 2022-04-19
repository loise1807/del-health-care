@extends('Admin.main')

@section('container-admin')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Akun</h1>
      </div>

      @if(session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
      </div>
      @endif

      <div class="table-responsive col-lg-8">
      <a href="/admin/users/create" class="btn btn-primary mb-3">Tambah Akun</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Username</th>
              <th scope="col">Role</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$user->username}}</td>
              <td>{{($user->role)}}</td>
              <td>
                @if($user->status == 1)
                <p class="text-success">Terhubung</p>
                @else
                <button class="badge bg-primary">
                  <a href="/admin/users/{{$user->id}}/hubungkan" class="text-white text-decoration-none">Hubungkan</a>
                </button>
                @endif
              </td>
              <td>
                <a href="/admin/users/{{$user->id}}" class="badge bg-success"><span data-feather="eye"></span></a>
                <a href="/admin/users/{{$user->id}}/edit" class="badge bg-warning"><span data-feather="edit-2"></span></a>
                <form action="/admin/users/{{$user->id}}" method="post" class="d-inline">
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