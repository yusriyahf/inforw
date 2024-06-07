@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-3">
            <h2 class="text-white">Pengajuan Surat</h2>
            <h6 class="text-white">Pengajuan Surat yang mudah dan anti ribet</h6>
        </div>
        <div class="col-12 mt-1">
            
            <a href="/sktm" class="btn btn-white btn-sm ms-auto text-primary">SKTM</a>
            <a href="/sp" class="btn btn-white btn-sm ms-auto text-primary">SP</a>
        </div>

        {{-- SKTM --}}
        <div class="col-12 mt-1">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Riwayat Pengajuan SKTM</h6>
                @if (session()->has('successsktm'))
                  <div class="alert alert-success col-lg-8" role="alert">
                    {{ session('successsktm') }}
                  </div>
                @endif
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pendaftar</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PDF</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Surat</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Surat</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($datasktm as $data)       
                      <tr>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $data->nama }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">

                          <span class="text-secondary text-xs font-weight-bold"><a href="/generate-pdf/sktm/{{ $data->sktm_id }}" class="text-primary" target="_blank">Cetak</a></span>

                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold"><a href="/sktm/{{ $data->sktm_id }}"  
                             class="text-primary">Detail</a></span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold text-danger">{{ $data->status }}</span>
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>

              
            </div>
         </div>

         {{-- SP --}}
        <div class="col-12 mt-1">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Riwayat Pengajuan SP</h6>
                @if (session()->has('successsp'))
                  <div class="alert alert-success col-lg-8" role="alert">
                    {{ session('successsp') }}
                  </div>
                @endif
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pendaftar</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PDF</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Surat</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Surat</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($datasp as $data)       
                      <tr>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $data->nama }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold"><a href="/generate-pdf/sp/{{ $data->sp_id }}" class="text-primary">Cetak</a></span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold"><a href="/sp/{{ $data->sp_id }}" class="text-primary">Detail</a></span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold text-danger">{{ $data->status }}</span>
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