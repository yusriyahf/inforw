@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-12 col-sm-12 mb-xl-0 mb-3">
        <h2 class="text-white">Selamat Datang {{ Auth::user()->nama }}</h2>
        <h6 class="text-white"> @can('is-admin')
            Admin
        @elsecan('is-rw')
            Ketua
        @elsecan('is-rt')
            Ketua RT {{ $data->getrt->nama }} 
        @elsecan('is-warga')
            Warga RT {{ $data->getrt->nama }}
        @endcan  RW {{ $data->getrw->nama }} Kecamatan Pandanwangi</h6>
      </div>

      <div class="col-12 mt-1">
        <a href="/pengumuman" class="btn btn-white btn-sm ms-auto text-primary" type="submit">Pengumuman</a>
      </div>

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
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jabatan</th>
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
                      <span class="text-secondary text-xs font-weight-bold">Ketua RT</span>
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
                      <span class="text-secondary text-xs font-weight-bold">Bendahara RT</span>
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
                      <span class="text-secondary text-xs font-weight-bold">Sekretaris RT</span>
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
                      <span class="text-secondary text-xs font-weight-bold">Ketua RW</span>
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
                      <span class="text-secondary text-xs font-weight-bold">Bendahara RW</span>
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
                      <span class="text-secondary text-xs font-weight-bold">Sekretaris RW</span>
                    </td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      @if(Gate::allows('is-rt') || Gate::allows('is-rw'))
          
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
    @endif
     


    </div> 
    
</div>
@if(Gate::allows('is-rt') || Gate::allows('is-rw'))

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

@endif
@endsection