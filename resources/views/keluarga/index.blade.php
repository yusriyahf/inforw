@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">

<div class="row">
     <div class="col-xl-12 col-sm-12 mb-2">
        <h2 class="text-white">Kartu Keluarga</h2>
        <h6 class="text-white">Kartu keluarga digital mudah dilihat</h6>
    </div>
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
            <div class="d-flex flex-column">
                <h6>Tabel {{ $title }}</h6>
                <span class="mb-2 text-sm">No KK: <span class="text-dark font-weight-bold ms-sm-2">{{ $data->no_kk }}</span></span>
                <span class="mb-2 text-sm">Kepala Keluarga: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->kepala_keluarga }}</span></span>
                <span class="mb-2 text-sm">RW: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->getrw->nama }}</span></span>
                <span class="text-sm">RT: <span class="text-dark ms-sm-2 font-weight-bold">{{ $data->getrt->nama }}</span></span>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nik</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tempat Lahir</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Lahir</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pekerjaan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Perkawinan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($anggota as $d) 
                <tr>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $d->nama }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $d->nik }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $d->jenis_kelamin }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $d->tempat_lahir }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $d->tanggal_lahir }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $d->pekerjaan }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $d->status_perkawinan }}</span>
                  </td>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection