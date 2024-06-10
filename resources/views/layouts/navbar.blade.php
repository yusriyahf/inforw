<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        @foreach ($breadcrumb->list as $key => $value)
        @if ($key == count($breadcrumb->list) - 1)
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $value }}</li>
        @elseif ($key == 0)
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white">{{ $value }}</a></li>
        @else
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="/{{ strtolower($value) }}">{{ $value }}</a></li>

        
        @endif

        @endforeach

      </ol>
      <h6 class="font-weight-bolder text-white mb-0">{{ $breadcrumb->title }}</h6>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
      
      </div>
      <ul class="navbar-nav  justify-content-end">

        
        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
              <i class="sidenav-toggler-line bg-white"></i>
            </div>
          </a>
        </li>
        <li class="nav-item dropdown pe-2 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bell cursor-pointer"></i>
          </a>
          <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
            @if (isset($notifPengumuman))
            @foreach ($notifPengumuman as $notifikasi)
            <li class="mb-2">
              <a class="dropdown-item border-radius-md" href="/pengumuman/{{ $notifikasi->pengumuman_id }}">
                <div class="d-flex py-1">
                  <div class="my-auto">
                    <img src="/img/illustrations/rocket-white.png" class="avatar avatar-sm  me-3 ">
                  </div>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="text-sm font-weight-light mb-1">
                      <span class="font-weight-light">Pengumuman </span>
                    </h6>
                    <h6 class="text-sm font-weight-normal mb-1">
                      <span class="font-weight-bold">{{ $notifikasi->judul }} </span> dari {{ $notifikasi->users->nama }}
                    </h6>
                    <p class="text-xs text-secondary mb-0">
                      <i class="fa fa-clock me-1"></i>
                      {{ $notifikasi->created_at->diffForHumans() }}
                    </p>
                  </div>
                </div>
              </a>
            </li>
            @endforeach
            @endif
            @if (isset($notifPengaduan))
            @foreach ($notifPengaduan as $notifikasi)
            <li class="mb-2">
              <a class="dropdown-item border-radius-md" href="/pengumuman/{{ $notifikasi->pengaduan_id }}">
                <div class="d-flex py-1">
                  <div class="my-auto">
                    <img src="/img/illustrations/rocket-white.png" class="avatar avatar-sm  me-3 ">
                  </div>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="text-sm font-weight-light mb-1">
                      <span class="font-weight-light">Pengaduan </span>
                    </h6>
                    <h6 class="text-sm font-weight-normal mb-1">
                      <span class="font-weight-bold">{{ $notifikasi->judul }} </span> dari {{ $notifikasi->users->nama }}
                    </h6>
                    <p class="text-xs text-secondary mb-0">
                      <i class="fa fa-clock me-1"></i>
                      {{ $notifikasi->created_at->diffForHumans() }}
                    </p>
                  </div>
                </div>
              </a>
            </li>
            @endforeach
            @endif
            @if (isset($notifSktm))
            @foreach ($notifSktm as $notifikasi)
            <li class="mb-2">
              <a class="dropdown-item border-radius-md" href="/pengumuman/{{ $notifikasi->pengaduan_id }}">
                <div class="d-flex py-1">
                  <div class="my-auto">
                    <img src="/img/illustrations/rocket-white.png" class="avatar avatar-sm  me-3 ">
                  </div>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="text-sm font-weight-light mb-1">
                      <span class="font-weight-light">Surat </span>
                    </h6>
                    <h6 class="text-sm font-weight-normal mb-1">
                      <span class="font-weight-bold">Pengajuan SKTM </span> dari {{ $notifikasi->users->nama }}
                    </h6>
                    <p class="text-xs text-secondary mb-0">
                      <i class="fa fa-clock me-1"></i>
                      {{ $notifikasi->created_at->diffForHumans() }}
                    </p>
                  </div>
                </div>
              </a>
            </li>
            @endforeach
            @endif
            @if (isset($notifSp))
            @foreach ($notifSp as $notifikasi)
            <li class="mb-2">
              <a class="dropdown-item border-radius-md" href="/pengumuman/{{ $notifikasi->pengaduan_id }}">
                <div class="d-flex py-1">
                  <div class="my-auto">
                    <img src="/img/illustrations/rocket-white.png" class="avatar avatar-sm  me-3 ">
                  </div>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="text-sm font-weight-light mb-1">
                      <span class="font-weight-light">Surat </span>
                    </h6>
                    <h6 class="text-sm font-weight-normal mb-1">
                      <span class="font-weight-bold">Pengajuan SKTM </span> dari {{ $notifikasi->users->nama }}
                    </h6>
                    <p class="text-xs text-secondary mb-0">
                      <i class="fa fa-clock me-1"></i>
                      {{ $notifikasi->created_at->diffForHumans() }}
                    </p>
                  </div>
                </div>
              </a>
            </li>
            @endforeach
            @endif
            {{-- <li class="mb-2">
              <a class="dropdown-item border-radius-md" href="javascript:;">
                <div class="d-flex py-1">
                  <div class="my-auto">
                    <img src="img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                  </div>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="text-sm font-weight-normal mb-1">
                      <span class="font-weight-bold">New album</span> by Travis Scott
                    </h6>
                    <p class="text-xs text-secondary mb-0">
                      <i class="fa fa-clock me-1"></i>
                      1 day
                    </p>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a class="dropdown-item border-radius-md" href="javascript:;">
                <div class="d-flex py-1">
                  <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                    <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>credit-card</title>
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(453.000000, 454.000000)">
                              <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                              <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                  </div>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="text-sm font-weight-normal mb-1">
                      Payment successfully completed
                    </h6>
                    <p class="text-xs text-secondary mb-0">
                      <i class="fa fa-clock me-1"></i>
                      2 days
                    </p>
                  </div>
                </div>
              </a>
            </li> --}}
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
{{-- <div class="col-sm-6">
  <ol class="breadcrumb float-sm-right">
    @foreach ($breadcrumb->list as $key => $value)
        @if ($key == count($breadcrumb->list) - 1)
          <li class="breadcrumb-item active">{{ $value }}</li>
        @else
          <li class="breadcrumb-item">{{ $value }}</li>
        @endif
    @endforeach
  </ol>
</div> --}}
