@extends('layouts.main')

@section('container') 



<div class="container mt-5">
  <div class="table-responsive col-lg-12">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @elseif(session()->has('success-delete'))
    <div class="alert alert-danger" role="alert">
      {{ session('success-delete') }}
    </div>
    @elseif(session()->has('success-edit'))
    <div class="alert alert-warning" role="alert">
      {{ session('success-edit') }}
    </div>
    @endif
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">Nama Mahasiswa</th>
            <th scope="col" class="text-center">Tanggal</th>
            <th scope="col" class="text-center">Gejala</th>
            <th scope="col" class="text-center">Diagnosa</th>
            <th scope="col" class="text-center">Deskripsi</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($rekmeds as $rekmed)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{!! $rekmed->nama_mahasiswa !!}</td>
            <td>{{date('l, d F Y', strtotime($rekmed->tanggal))}}</td>
            <td>{!! $rekmed->gejala !!}</td>
            <td>{!! Str::limit(strip_tags($rekmed->diagnosa),25) !!}</td>
            <td>{!! Str::limit(strip_tags($rekmed->deskripsi),25) !!}</td>
            <td>
              <a href="/pengurus/rekmeds/{{$rekmed->id}}" class="badge bg-dark"><i class="bi bi-eye-fill"></i></a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection