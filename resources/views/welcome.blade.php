@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-12 col-sm-12 mb-xl-0 mb-5">
        <h2 class="text-white">Selamat Datang {{ Auth::user()->nama }}</h2>
        <h4 class="text-white"> @can('is-admin')
            Admin
        @elsecan('is-rw')
            Ketua RW
        @elsecan('is-rt')
            Ketua RT 
        @elsecan('is-warga')
            Warga RT {{ $data->getrt->nama }}
        @endcan  RW {{ $data->getrw->nama }} Kecamatan Pandanwangi</h4>
      </div>

      <div class="col-12 mt-3">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Struktur Jabatan RT {{ $data->getrt->nama }} dan RW {{ $data->getrw->nama }} Pandanwangi</h6>
          {{-- </div> --}}
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
    </div> 
      
</div>
@endsection