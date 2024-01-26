<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none" >
    <div class="container-xl">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-nav flex-row order-md-last">
        @if(auth()->guard('user')->check())
        <div class="nav-item dropdown">
          <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            <div class="d-none d-xl-block ps-2">
              <div>{{ Auth::user()->name }}</div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <a href="/proseslogoutadmin" class="dropdown-item">Logout</a>
          </div>
        </div>
        @endif
        @if(auth()->guard('karyawan')->check())
        <div class="nav-item dropdown">
          <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
            <div class="d-none d-xl-block ps-2">
              <div>{{ Auth::user()->nama_lengkap }}</div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <a href="/proseslogout" class="dropdown-item">Logout</a>
          </div>
        </div>
        @endif
      </div>
      <div class="collapse navbar-collapse" id="navbar-menu">
        <div>
        </div>
      </div>
    </div>
  </header>