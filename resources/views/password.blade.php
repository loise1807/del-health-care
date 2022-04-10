@extends('layouts.main')

@section('container')
<div class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah password</h1>
  </div>
  
  <div class="col-lg-6">
    
    <form method="post" action="/{{ $user->role }}/password/{{$user->id}}">
      @method('put')
      @csrf
      <div class="mb-2 col-md-4">
        <label for="username" class="form-label"><b>username</b></label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $user->username }}" required readonly>
        @error('username')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-6">
        <label for="password" class="form-label"><b>Password</b></label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
        @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-6">
        <label for="repassword" class="form-label"><b>Re-Password</b></label>
        <input type="password" class="form-control @error('repassword') is-invalid @enderror" id="repassword" name="repassword" required >
        @error('repassword')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-2 col-md-6">
        <button type="submit" class="btn btn-primary mb-3 mt-3">Ubah Password</button>
      </div>
    </form>
  
  </div>
</div>

@endsection