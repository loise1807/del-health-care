<nav>
  <div class="logo-w3ls" id="logo-w3ls">
      <h3>
          <a href="/" style="color: white;"><b>Del</b> <span style="background-color: transparent; color:#07be94"><b>Health Care</b></span></a>
      </h3>

  </div>

  <label for="drop" class="toggle">Menu</label>
  <input type="checkbox" id="drop" />
  <ul class="menu">
      <li class="mr-lg-3 {{ Request::is('/') ? 'active' : '' }}"><a href="/">Beranda</a></li>
      
      
      
      @can('home-admin')
      <li class="mr-lg-3 {{ Request::is('/dashboard') ? 'active' : '' }}"><a href="/dashboard">Dashboard</a></li>
      @endcan

      @can('home-mahasiswa')
      <li class="mr-lg-3 {{ Request::is('mahasiswa/konsultasi*') ? 'active' : '' }}"><a href="/mahasiswa/konsultasi">Konsultasi</a></li>
      <li class="mr-lg-3 {{ Request::is('mahasiswa/rekmeds*') ? 'active' : '' }}"><a href="/mahasiswa/rekmeds">Rekam Medis</a></li>
      <li class="mr-lg-3 {{ Request::is('mahasiswa/riwayatpenyakits*') ? 'active' : '' }}"><a href="/mahasiswa/riwayatpenyakits">Riwayat Penyakit</a></li>
      @endcan

      @can('home-dokter')
      <li class="mr-lg-3 {{ Request::is('dokter/konsultasi*') ? 'active' : '' }}"><a href="/dokter/konsultasi">Konsultasi</a></li>
      <li class="mr-lg-3 {{ Request::is('dokter/rekammedis*') ? 'active' : '' }}"><a href="/dokter/rekammedis">Rekam Medis</a></li>
      <li class="mr-lg-3 {{ Request::is('dokter/riwayatpenyakits*') ? 'active' : '' }}"><a href="/dokter/riwayatpenyakits">Riwayat Penyakit</a></li>
      @endcan

      @can('home-pengurus')
      <li class="mr-lg-3 {{ Request::is('pengurus/rekmeds*') ? 'active' : '' }}"><a href="/pengurus/rekmeds">Rekam Medis</a></li>
      <li class="mr-lg-3 {{ Request::is('pengurus/riwayatpenyakits*') ? 'active' : '' }}"><a href="/pengurus/riwayatpenyakits">Riwayat Penyakit</a></li>
      @endcan
      @if(Gate::check('home-dokter') || Gate::check('home-mahasiswa') || Gate::check('home-pengurus'))
      <li class="mr-lg-1 mr-1">
        <!-- First Tier Drop Down -->
        <label for="drop-1" class="toggle">Notification <i class="bi bi-caret-down-fill"></i> </label>
        {{-- <a href="#" ><i class="bi bi-bell-fill"> </i></a> --}}
        <a href="#" class="notification">
          <i class="bi bi-bell-fill"> </i>
          @if($notifikasis->count() != 0 && $notifikasis->where('status',0)->count() > 0)
          <span class="badge">{{ $notifikasis->where('status',0)->count() }}</span>
          @endif
        </a>
        <input type="checkbox" id="drop-1" />
        <ul >
          @if($notifikasis->count() != 0)
          
          @php
          $i=0;
          @endphp

          @foreach($notifikasis as $notifikasi)
          @if($i<3)
          @if($notifikasi->status == 0)
          <li class="mr-lg-3 mb-1" style="background-color:{{ $notifikasi->bgcolor }}">
            <a  href="#myFrom{{ $notifikasi->id }}"><small style="font-size: 10px;">{{ $notifikasi->judul }}</small></a>
          </li>
          @elseif($notifikasi->status == 1)
          <li class="mr-lg-3 mb-1" style="background-color: {{ $notifikasi->bgcolor }}">
            <a href="#myFrom{{ $notifikasi->id }}"><small style="font-size: 10px;">{{ $notifikasi->judul }}</small></a>
          </li>
          @endif
          {{-- Pop Up Form --}}
          <div id="myFrom{{ $notifikasi->id }}" class="pop-overlay animate">
            <div class="popup" style="background: linear-gradient(to bottom, rgb(179, 179, 179) 20%, {{ $notifikasi->bgcolor }} 100%);">
              <a class="close text-white" href="">&times;</a>
              <div class="card text-white" style="border-radius: 30px; background-color: {{ $notifikasi->bgcolor }};">
                <div class="card-body">
                  <h4 class="card-title">{{ $notifikasi->judul }}</h4>
                  <p class="card-text text-white">{{ $notifikasi->isi }}</p>
                  <small class="card-link">{{ $notifikasi->created_at->diffForHumans() }}</small>
                </div>
              </div>
            </div>
          </div>
          {{-- End Pop Up Form --}}
          @endif
          @php
          $i++;
          @endphp
          @endforeach

            <li class="mr-lg-1">
              <a href="/notifikasi" class="justify-content-center"><small style="font-size:8px">Semua Notifikasi</small></a>
            </li> 

            {{-- Pop Up Form --}}
          <div id="allNotifikasi" class="pop-overlay animate">
            <div class="popup" style="background: linear-gradient(to bottom, rgb(179, 179, 179) 20%, {{ $notifikasi->bgcolor }} 100%);">
              <a class="close text-white" href="">&times;</a>
              <div class="card text-white" style="border-radius: 30px; background-color: {{ $notifikasi->bgcolor }};">
                <div class="row g2">
                  @foreach($notifikasis as $notifikasi)
                  <div class="card-body col-md-6" style="background-color: {{ $notifikasi->bgcolor }};">
                    <h4 class="card-title">{{ $notifikasi->judul }}</h4>
                    <p class="card-text text-white">{{ $notifikasi->isi }}</p>
                    <small class="card-link">{{ $notifikasi->created_at->diffForHumans() }}</small>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          {{-- End Pop Up Form --}}


          @else
          <li class="mr-lg-1">
            <p class="justify-content-center"><small style="font-size:10px">Anda tidak memiliki Notifikasi</small></p>
          </li>
          @endif
            {{-- <li class="mr-lg-3"><a href="#"><i class="bi bi-lock-fill"></i>y</a></li> --}}
        </ul>
      </li>
      @endif
      @auth
      <li class="mr-lg-1 mr-1">
          <!-- First Tier Drop Down -->
          <label for="drop-2" class="toggle">Account <i class="bi bi-caret-down-fill"></i> </label>
          <a href="#" >{{ auth()->user()->username }} <i class="bi bi-caret-down-fill"></i></a>
          <input type="checkbox" id="drop-2" />
          <ul>
              @can('home-pengurus')
              <li class="mr-lg-3 {{ Request::is(auth()->user()->role.'/profile*') ? 'active' : '' }}"><a href="/{{ auth()->user()->role }}/profile"><i class="bi bi-person-circle"></i>Profile</a></li>
              <li class="mr-lg-3 {{ Request::is(auth()->user()->role.'/password*') ? 'active' : '' }}"><a href="/{{ auth()->user()->role }}/password"><i class="bi bi-lock-fill"></i>Password</a></li>
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
              <li class="mr-lg-3 {{ Request::is(auth()->user()->role.'/profile*') ? 'active' : '' }}"><a href="/{{ auth()->user()->role }}/profile"><i class="bi bi-person-circle"></i>Profile</a></li>
              <li class="mr-lg-3 {{ Request::is(auth()->user()->role.'/password*') ? 'active' : '' }}"><a href="/{{ auth()->user()->role }}/password"><i class="bi bi-lock-fill"></i>Password</a></li>
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
              <li class="mr-lg-3 {{ Request::is(auth()->user()->role.'/profile*') ? 'active' : '' }}"><a href="/{{ auth()->user()->role }}/profile"><i class="bi bi-person-circle"></i>Profile</a></li>
              <li class="mr-lg-3 {{ Request::is(auth()->user()->role.'/password*') ? 'active' : '' }}"><a href="/{{ auth()->user()->role }}/password"><i class="bi bi-lock-fill"></i>Password</a></li>
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
      <li class="mr-lg-3"><a href="/login">Login</a></li>
      @endauth
  </ul>
</nav>