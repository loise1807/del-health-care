<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span><b>Saved reports</b></span>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}" href="/admin/users">
              <span data-feather="user"></span>
              Akun
            </a>
          </li>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/asramas*') ? 'active' : '' }}" href="/admin/asramas">
              <span data-feather="briefcase"></span>
              Asrama
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/mahasiswas*') ? 'active' : '' }}" href="/admin/mahasiswas">
              <span data-feather="book-open"></span>
              Mahasasiswa
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/petugas_asramas*') ? 'active' : '' }}" href="/admin/petugas_asramas">
              <span data-feather="home"></span>
              Petugas Asrama
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/dokters*') ? 'active' : '' }}" href="/admin/dokters">
              <span data-feather="plus-circle"></span>
              Dokter
            </a>
          </li>
        </ul>
      </div>
    </nav>