@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-3">
            <h2 class="text-white">Selamat Datang {{ Auth::user()->nama }}</h2>
            <h6 class="text-white">
              @if (Gate::check('is-admin'))
                  Admin
              @elseif (Gate::check('is-rw'))
                  Ketua
              @elseif (Gate::check('is-rt'))
                  Ketua RT {{ $data->getrt->nama }},
              @elseif (Gate::check('is-bendahara'))
                  Bendahara RT {{ Auth::user()->role }},
              @elseif (Gate::check('is-warga'))
                  Warga RT {{ $data->getrt->nama }},
              @endif  
              RW {{ $data->getrw->nama }} Kecamatan Pandanwangi
          </h6>
          
        </div>
        @can('is-warga')
            
        <div class="col-12 mt-1">
          <a href="/pengumuman" class="btn btn-white btn-sm ms-auto text-primary" type="submit">Pengumuman</a>
        </div>
        
        @endcan

        @if (Gate::check('is-rw') || Gate::check('is-rt'))
        <div class="row mb-2 mt-3">
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <a href="/warga" class="text-reset text-decoration-none">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                    Total Warga
                                </p>
                                <h5 class="font-weight-bolder">{{ $totalWarga }}</h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fas fa-users text-lg opacity-10" style="color: #ffffff;"></i>
                                {{-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> --}}
                            </div>
                        </div>
                    </div>
                </div>
              </a>
            </div>
            </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <a href="/pengaduan" class="text-reset text-decoration-none">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                    Total Pengaduan
                                </p>
                                <h5 class="font-weight-bolder">{{ $totalPengaduan }}</h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fas fa-question text-lg opacity-10" style="color: #ffffff;"></i>
                                {{-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> --}}
                            </div>
                        </div>
                    </div>
                </div>
              </a>
            </div>
            </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                    Total Surat
                                </p>
                                <h5 class="font-weight-bolder">{{ $totalSurat }}</h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fas fa-mail-bulk text-lg opacity-10" style="color: #ffffff;"></i>
                                {{-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                    Total Peminjaman
                                </p>
                                <h5 class="font-weight-bolder">{{ $totalPeminjaman }}</h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                
                                {{-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        @endif
        <div class="col-12 mt-1">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Struktur Jabatan RT {{ $data->getrt->nama }} dan RW {{ $data->getrw->nama }} Pandanwangi</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jabatan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kontak</th>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">1 </span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">{{ $data->getrt->getketuart->nama }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">{{ $data->getrt->getketuart->alamat }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">Ketua RT</span>
                                </td>
                                
                                <td class="align-middle text-center text-sm">
                                  @isset($data->getrt->getketuart->notelp)
                                  <a href="https://wa.me/62{{ $data->getrt->getketuart->notelp }}" target="_blank">
                                      <span class="text-success text-xs font-weight-bold">WhatsApp</span>
                                  </a>
                              @else
                              <span class="text-danger text-xs font-weight-bold">WhatsApp</span>
                              @endisset
                              </td>
                              
                              </tr>
                              <tr>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">2 </span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">{{ $data->getrt->getbendaharart->nama }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">{{ $data->getrt->getbendaharart->alamat }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">Bendahara RT</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  @isset($data->getrt->getbendaharart->notelp)
                                      <a href="https://wa.me/62{{ $data->getrt->getbendaharart->notelp }}" target="_blank">
                                          <span class="text-success text-xs font-weight-bold">WhatsApp</span>
                                      </a>
                                  @else
                                  <span class="text-danger text-xs font-weight-bold">WhatsApp</span>
                                  @endisset
                              </td>
                              
                              </tr>
                              <tr>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">3 </span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">{{ $data->getrt->getsekretarisrt->nama }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">{{ $data->getrt->getsekretarisrt->alamat }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">Sekretaris RT</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  @isset($data->getrt->getsekretarisrt->notelp)
                                      <a href="https://wa.me/62{{ $data->getrt->getsekretarisrt->notelp }}" target="_blank">
                                          <span class="text-success text-xs font-weight-bold">WhatsApp</span>
                                      </a>
                                  @else
                                  <span class="text-danger text-xs font-weight-bold">WhatsApp</span>
                                  @endisset
                              </td>
                              
                              </tr>
                              <tr>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">4 </span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">{{ $data->getrw->getketuarw->nama }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">{{ $data->getrw->getketuarw->alamat }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">Ketua RW</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  @isset($data->getrt->getketuarw->notelp)
                                      <a href="https://wa.me/62{{ $data->getrt->getketuarw->notelp }}" target="_blank">
                                          <span class="text-success text-xs font-weight-bold">WhatsApp</span>
                                      </a>
                                  @else
                                  <span class="text-danger text-xs font-weight-bold">WhatsApp</span>
                                  @endisset
                              </td>
                              
                              </tr>
                              <tr>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">5 </span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">{{ $data->getrw->getbendahararw->nama }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">{{ $data->getrw->getbendahararw->alamat }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">Bendahara RW</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  @isset($data->getrt->getbendahararw->notelp)
                                      <a href="https://wa.me/62{{ $data->getrt->getbendahararw->notelp }}" target="_blank">
                                          <span class="text-success text-xs font-weight-bold">WhatsApp</span>
                                      </a>
                                  @else
                                  <span class="text-danger text-xs font-weight-bold">WhatsApp</span>
                                  @endisset
                              </td>
                              
                              </tr>
                              <tr>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">6 </span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">{{ $data->getrw->getsekretarisrw->nama }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">{{ $data->getrw->getsekretarisrw->alamat }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  <span class="text-secondary text-xs font-weight-bold">Sekretaris RW</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                  @isset($data->getrt->getsekretarisrw->notelp)
                                      <a href="https://wa.me/62{{ $data->getrt->getsekretarisrw->notelp }}" target="_blank">
                                          <span class="text-success text-xs font-weight-bold">WhatsApp</span>
                                      </a>
                                  @else
                                    <span class="text-danger text-xs font-weight-bold">WhatsApp</span>
                                  @endisset
                              </td>
                              
                              </tr>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

   


    <!-- Start of financial information -->
        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                  <div class="card-body p-3">
                      <div class="row">
                          <div class="col-8">
                              <div class="numbers">
                                  <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                      Total Saldo
                                  </p>
                                  <h5 class="font-weight-bolder">{{ formatRupiah($totalSaldo) }}</h5>
                              </div>
                          </div>
                          <div class="col-4 text-end">
                              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
    
              <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <a href="/pemasukan" class="text-reset text-decoration-none">
                  <div class="card">
                      <div class="card-body p-3">
                      <div class="row">
                          <div class="col-8">
                              <div class="numbers">
                                  <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                      Total Pemasukan
                                  </p>
                                  <h5 class="font-weight-bolder">{{ formatRupiah($totalPemasukan) }}</h5>
                              </div>
                          </div>
                          <div class="col-4 text-end">
                              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                              </div>
                          </div>
                      </div>
                  </div>
                  </div>
                </a>
              </div>
              <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <a href="/pengeluaran" class="text-reset text-decoration-none">
                  <div class="card">
                      <div class="card-body p-3">
                      <div class="row">
                          <div class="col-8">
                              <div class="numbers">
                                  <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                      Total Pengeluaran
                                  </p>
                                  <h5 class="font-weight-bolder">{{ formatRupiah($totalPengeluaran) }}</h5>
                              </div>
                          </div>
                          <div class="col-4 text-end">
                              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                              </div>
                          </div>
                      </div>
                  </div>
                  </div>
                </a>
              </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Pemasukan Keuangan</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="pemasukanChart" width="800" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Pengeluaran Keuangan</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="pengeluaranChart" width="800" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <!-- End of financial information -->

    @if (Gate::allows('is-rt') || Gate::allows('is-rw'))
    <div class="row mt-3">
      <div class="col-lg-6 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Data Umur Warga</h6>
            </div>
            <div class="card-body p-3">
                <div class="chart">
                    <canvas id="umurChart" width="800" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
          <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Data Jenis Kelamin Warga</h6>
          </div>
          <div class="card-body p-3">
              <div class="chart">
                  <canvas id="jenisKelaminChart" width="400" height="300"></canvas>
              </div>
          </div>
      </div>
  </div>
  
  </div>
  @endif
  
    </div>
</div>

<script>
    var ctx = document.getElementById('pemasukanChart').getContext('2d');
    var pemasukanChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Pemasukan',
                data: {!! json_encode($pemasukanChartData) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var ctx2 = document.getElementById('pengeluaranChart').getContext('2d');
    var pengeluaranChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Pengeluaran',
                data: {!! json_encode($pengeluaranChartData) !!},
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@if (Gate::allows('is-rt') || Gate::allows('is-rw'))
  <script>
    // Umur Chart
    var ctx3 = document.getElementById('umurChart').getContext('2d');
    var umurChart = new Chart(ctx3, {
        type: 'pie',
        data: {
            labels: {!! json_encode(array_keys($umurChartData)) !!},
            datasets: [{
                label: 'Distribusi Umur Pengguna',
                data: {!! json_encode(array_values($umurChartData)) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'right'
            }
        }
    });

    // Jenis Kelamin Chart
    var jenisKelaminCtx = document.getElementById('jenisKelaminChart').getContext('2d');
    var jenisKelaminChart = new Chart(jenisKelaminCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($jenisKelaminChartData)) !!},
            datasets: [{
                label: 'Jumlah Pengguna',
                data: {!! json_encode(array_values($jenisKelaminChartData)) !!},
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'x',
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0
                    }
                }
            }
        }
    });
  </script>
@endif


@endsection
