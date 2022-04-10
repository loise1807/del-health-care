<header>
  <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="/">Del<span class="text-primary"> Health Care</span></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupport">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
            <a class="nav-link" href="/">Home</a>
          </li>
          @can('home-admin')
          <li class="nav-item {{ Request::is('/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard">Dashboard</a>
          </li>
          @endcan
          @can('home-dokter')
          <li class="nav-item {{ Request::is('dokter/konsultasi*') ? 'active' : '' }}">
            <a class="nav-link" href="/dokter/konsultasi">Konsultasi</a>
          </li>
          <li class="nav-item {{ Request::is('dokter/rekammedis*') ? 'active' : '' }}">
            <a class="nav-link" href="/dokter/rekammedis">Rekam Medis</a>
          </li>
          <li class="nav-item {{ Request::is('dokter/riwayatpenyakits*') ? 'active' : '' }}">
            <a class="nav-link" href="/dokter/riwayatpenyakits">Riwayat Penyakit</a>
          </li>
          @endcan
          @can('home-mahasiswa')
          <li class="nav-item {{ Request::is('mahasiswa/konsultasi*') ? 'active' : '' }}">
            <a class="nav-link" href="/mahasiswa/konsultasi">Konsultasi</a>
          </li>
          <li class="nav-item {{ Request::is('mahasiswa/rekmeds*') ? 'active' : '' }}">
            <a class="nav-link" href="/mahasiswa/rekmeds">Rekam Medis</a>
          </li>
          <li class="nav-item {{ Request::is('mahasiswa/riwayatpenyakits*') ? 'active' : '' }}">
            <a class="nav-link" href="/mahasiswa/riwayatpenyakits">Riwayat Penyakit</a>
          </li>
          @endcan
          @can('home-pengurus')
          <li class="nav-item {{ Request::is('pengurus/rekmeds*') ? 'active' : '' }}">
            <a class="nav-link" href="/pengurus/rekmeds">Rekam Medis</a>
          </li>
          <li class="nav-item {{ Request::is('pengurus/riwayatpenyakits*') ? 'active' : '' }}">
            <a class="nav-link" href="/pengurus/riwayatpenyakits">Riwayat Penyakit</a>
          </li>
          @endcan
          @auth
          <li class="nav-item dropdown {{ Request::is('mahasiswa/profile*') ? 'active' : Request::is('mahasiswa/changepassword*') ? 'active' : '' }}">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu">
              <li class="">
                <a class="dropdown-item" href="/{{ auth()->user()->role }}/profile">
                  <i class="bi bi-person-circle"></i>
                  Profile Setting
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="#">
                  <i class="bi bi-lock-fill"></i>
                  Change Password
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    <i class="bi bi-box-arrow-in-right"></i> Log Out 
                  </button>
                </form>
              </li>
            </ul>
            {{-- <a class="btn btn-primary ml-lg-3" href="/login">Logout</a> --}}
          </li>
          @else
          <li class="nav-item">
            <a class="btn btn-primary ml-lg-3" href="/login">Login</a>
          </li>
          @endauth
        </ul>
      </div> <!-- .navbar-collapse -->
    </div> <!-- .container -->
  </nav>
</header>