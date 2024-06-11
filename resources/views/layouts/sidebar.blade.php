<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/">
        <img src="/img/logoterang.png" class="navbar-brand-img h-100" alt="main_logo" width="14px" height="18px" style="margin-right: 10px;">
        <span class="ms-1 font-weight-bold">InfoRW</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="/">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Beranda</span>
          </a>
        </li>
        @if(Gate::allows('is-rt') || Gate::allows('is-rw')|| Gate::allows('is-admin'))
        <li class="nav-item">
          <a class="nav-link {{ Request::is('warga') ? 'active' : '' }}" href="/warga">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Warga</span>
          </a>
        </li>
        @endif
        @if(Gate::allows('is-rt') || Gate::allows('is-rw') || Gate::allows('is-admin'))
          <li class="nav-item">
              <a class="nav-link {{ Request::is('aset') ? 'active' : '' }}" href="/aset">
                  <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="fas fa-hand-holding-usd text-warning text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1">Aset</span>
              </a>
          </li>
        @endif
        {{-- <li class="nav-item">
          <a class="nav-link " href="../pages/tables.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Iuran</span>
          </a>
        </li> --}}
        @if(Gate::allows('is-rt') || Gate::allows('is-rw') ||Gate::allows('is-warga') )
        <li class="nav-item">
          <a class="nav-link {{ Request::is('pengaduan*') ? 'active' : '' }}" href="/pengaduan">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengaduan</span>
          </a>
        </li>
        @endif
        {{-- <li class="nav-item">
          <a class="nav-link " href="../pages/tables.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Persuratan</span>
          </a>
        </li> --}}
        {{-- @if(Gate::allows('is-rt') || Gate::allows('is-rw'))
        <li class="nav-item">
          <a class="nav-link {{ Request::is('organisasi') ? 'active' : '' }}" href="/organisasi">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Organisasi</span>
          </a>
        </li>
        @endif --}}
        @can('is-warga')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('pengumuman*') ? 'active' : '' }}" href="/pengumuman">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengumuman</span>
          </a>
        </li>
        @endcan
        @can('is-admin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('rt*') ? 'active' : '' }}" href="/rt">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">RT</span>
          </a>
        </li>
        @endcan
        @can('is-admin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('rw*') ? 'active' : '' }}" href="/rw">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">RW</span>
          </a>
        </li>
        @endcan

        @if(Gate::allows('is-rt') || Gate::allows('is-rw'))
        <li class="nav-item">
          <a class="nav-link {{ Request::is('pengumuman*') ? 'active' : '' }}" href="/pengumuman">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengumuman</span>
          </a>
        </li>
        @endif
        @if(Gate::allows('is-sekretaris') || Gate::allows('is-warga'))
        <li class="nav-item">
          <a class="nav-link {{ Request::is('surat') ? 'active' : '' }}" href="/surat">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Surat</span>
          </a>
        </li>
        @endif
        {{-- @can('is-warga')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('organisasi') ? 'active' : '' }}" href="/pengaduan">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengaduan</span>
          </a>
        </li>
        @endcan --}}
        @can('is-warga')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('aset*') ? 'active' : '' }}" href="/aset">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Aset</span>
          </a>
        </li>
        @endcan
        @can('is-warga')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('aset*') ? 'active' : '' }}" href="/daftarBansos">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Daftar Bansos</span>
          </a>
        </li>
        @endcan
        @if(Gate::allows('is-rt') || Gate::allows('is-rw') || Gate::allows('is-admin'))
        <li class="nav-item">
          <a class="nav-link {{ Request::is('bansos') ? 'active' : '' }}" href="/bansos">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Bansos</span>
          </a>
        </li>
        @endif
        @if(Gate::allows('is-rt') || Gate::allows('is-rw'))
        <li class="nav-item">
          <a class="nav-link {{ Request::is('peminjaman') ? 'active' : '' }}" href="/peminjaman">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Peminjaman</span>
          </a>
        </li>
        @endif

        {{-- @can('is-warga')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('peminjaman*') ? 'active' : '' }}" href="/peminjaman">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Peminjaman</span>
          </a>
        </li>
        @endcan --}}
        @if(Gate::allows('is-rt') || Gate::allows('is-rw') ||Gate::allows('is-warga') )

        <li class="nav-item">
          <a class="nav-link {{ Request::is('kegiatan*') ? 'active' : '' }}" href="/kegiatan">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Kegiatan Warga</span>
          </a>
        </li>
        @endif
        {{-- <li class="nav-item">
          <a class="nav-link " href="../pages/rtl.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Iuran Warga</span>
          </a>
        </li> --}}
        

        
            
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Keuangan</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('pemasukan*') ? 'active' : '' }}" href="/pemasukan">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pemasukan</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('pengeluaran*') ? 'active' : '' }}" href="/pengeluaran">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengeluaran</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('laporan*') ? 'active' : '' }}" href="/laporan">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Laporan</span>
          </a>
        </li>

        @if(Gate::allows('is-rt') || Gate::allows('is-rw') || Gate::allows('is-warga') || Gate::allows('is-bendahara'))
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        

        <li class="nav-item">
          <a class="nav-link {{ Request::is('profile*') ? 'active' : '' }}" href="/profile">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('keluarga*') ? 'active' : '' }}" href="/keluarga">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Keluarga</span>
          </a>
        </li>
        @endif
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
          </div>
        </div>
      </div>
      <form action="/logout" method="post">
        @csrf
        <button type="submit" class="btn btn-dark btn-sm w-100 mb-3">Logout</button>
      </form>
    </div>
  </aside>

    