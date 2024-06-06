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
        
        <li class="nav-item dropdown pe-2 d-flex align-items-center ms-3">
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
           
          </ul>
        </li>
        <li class="nav-item dropdown pe-2 d-flex align-items-center ms-3">
          <a href="javascript:;" class="nav-link text-white p-0" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user cursor-pointer"></i>
          </a>
          <!-- Menu Dropdown Profil -->
          <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownProfile">
            <!-- Konten Profil -->
            <li>
              <p class="dropdown-item border-radius-md">{{ auth()->user()->nama }} - {{ auth()->user()->roles->nama }}</p>
            
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class=" btn btn-dark btn-sm w-100 mb-3">Logout</button>
              </form>
            </li>
          </ul>
        </li>
        
        
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
