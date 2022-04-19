<nav>
  <div class="logo-w3ls" id="logo-w3ls">
      <h3>
          <a href="index.html" style="color: white;">Del <span style="background-color: transparent; color:#07be94">Health Care</span></a>
      </h3>

  </div>

  <label for="drop" class="toggle">Menu</label>
  <input type="checkbox" id="drop" />
  <ul class="menu">
      <li class="mr-lg-3 mr-2 {{ Request::is('/') ? 'active' : '' }}"><a href="/">Beranda</a></li>

      @can('home-admin')
      <li class="mr-lg-3 mr-2 {{ Request::is('/dashboard') ? 'active' : '' }}"><a href="/dashboard">Dashboard</a></li>
      @endcan

      @can('home-mahasiswa')
      <li class="mr-lg-3 mr-2 {{ Request::is('mahasiswa/konsultasi*') ? 'active' : '' }}"><a href="/mahasiswa/konsultasi">Konsultasi</a></li>
      <li class="mr-lg-3 mr-2 {{ Request::is('mahasiswa/rekmeds*') ? 'active' : '' }}"><a href="/mahasiswa/rekmeds">Rekam Medis</a></li>
      <li class="mr-lg-3 mr-2 {{ Request::is('mahasiswa/riwayatpenyakits*') ? 'active' : '' }}"><a href="/mahasiswa/riwayatpenyakits">Riwayat Penyakit</a></li>
      @endcan

      @can('home-dokter')
      <li class="mr-lg-3 mr-2 {{ Request::is('dokter/konsultasi*') ? 'active' : '' }}"><a href="/dokter/konsultasi">Konsultasi</a></li>
      <li class="mr-lg-3 mr-2 {{ Request::is('dokter/rekammedis*') ? 'active' : '' }}"><a href="/dokter/rekammedis">Rekam Medis</a></li>
      <li class="mr-lg-3 mr-2 {{ Request::is('dokter/riwayatpenyakits*') ? 'active' : '' }}"><a href="/dokter/riwayatpenyakits">Riwayat Penyakit</a></li>
      @endcan

      @can('home-pengurus')
      <li class="mr-lg-3 mr-2 {{ Request::is('pengurus/rekmeds*') ? 'active' : '' }}"><a href="/pengurus/rekmeds">Rekam Medis</a></li>
      <li class="mr-lg-3 mr-2 {{ Request::is('pengurus/riwayatpenyakits*') ? 'active' : '' }}"><a href="/pengurus/riwayatpenyakits">Riwayat Penyakit</a></li>
      @endcan
      @auth
      <li class="mr-lg-4 mr-3">
          <!-- First Tier Drop Down -->
          <label for="drop-2" class="toggle">Account <i class="bi bi-caret-down-fill"></i> </label>
          <a href="#" >{{ auth()->user()->username }} <i class="bi bi-caret-down-fill"></i></a>
          <input type="checkbox" id="drop-2" />
          <ul>
              @can('home-pengurus')
              <li class="mr-lg-3 mr-2 {{ Request::is(auth()->user()->role.'/profile*') ? 'active' : '' }}"><a href="/{{ auth()->user()->role }}/profile"><i class="bi bi-person-circle"></i>Profile</a></li>
              <li class="mr-lg-3 mr-2 {{ Request::is(auth()->user()->role.'/password*') ? 'active' : '' }}"><a href="/{{ auth()->user()->role }}/password"><i class="bi bi-lock-fill"></i>Password</a></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button style="background-color: transparent;border:0">
                      <i class="bi bi-box-arrow-in-right"></i></i>Log Out
                  </button>
                </form>
              </li>
              @endcan
              @can('home-mahasiswa')
              <li class="mr-lg-3 mr-2 {{ Request::is(auth()->user()->role.'/profile*') ? 'active' : '' }}"><a href="/{{ auth()->user()->role }}/profile"><i class="bi bi-person-circle"></i>Profile</a></li>
              <li class="mr-lg-3 mr-2 {{ Request::is(auth()->user()->role.'/password*') ? 'active' : '' }}"><a href="/{{ auth()->user()->role }}/password"><i class="bi bi-lock-fill"></i>Password</a></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button style="background-color: transparent;border:0">
                      <i class="bi bi-box-arrow-in-right"></i></i>Log Out
                  </button>
                </form>
              </li>
              @endcan
              @can('home-dokter')
              <li class="mr-lg-3 mr-2 {{ Request::is(auth()->user()->role.'/profile*') ? 'active' : '' }}"><a href="/{{ auth()->user()->role }}/profile"><i class="bi bi-person-circle"></i>Profile</a></li>
              <li class="mr-lg-3 mr-2 {{ Request::is(auth()->user()->role.'/password*') ? 'active' : '' }}"><a href="/{{ auth()->user()->role }}/password"><i class="bi bi-lock-fill"></i>Password</a></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button style="background-color: transparent;border:0">
                      <i class="bi bi-box-arrow-in-right"></i></i>Log Out
                  </button>
                </form>
              </li>
              @endcan
              @can('home-admin')
              <li><a href="/{{ auth()->user()->role }}/password"><i class="bi bi-lock-fill"></i>Password</a></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button style="background-color: transparent;border:0">
                      <i class="bi bi-box-arrow-in-right"></i></i>Log Out
                  </button>
                </form>
              </li>
              @endcan
          </ul>
      </li>
      @else
      <li class="mr-lg-3 mr-2"><a href="/login">Login</a></li>
      @endauth
  </ul>
</nav>