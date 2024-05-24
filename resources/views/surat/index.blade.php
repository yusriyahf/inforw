@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-3">
            <h2 class="text-white">Pengajuan Surat</h2>
            <h6 class="text-white">Pengajuan Surat yang mudah dan anti ribet</h6>
        </div>
        <div class="col-12 mt-1">
            {{-- <button class="btn btn-white btn-sm ms-auto text-primary" type="submit">SKTM</button> --}}
            <a href="/sktm" class="btn btn-white btn-sm ms-auto text-primary me-2">SKTM</a>
            <a href="#" class="btn btn-white btn-sm ms-auto text-primary">Laporan Kematian</a>
        </div>

        <div class="col-12 mt-1">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Riwayat Pengajuan SKTM</h6>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pendaftar</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Surat</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Surat</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            
                      <tr>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->nama }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold"><a href="/sktm/{{ $d->sktm_id }}" class="text-primary">Cetak</a></span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->status }}</span>
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