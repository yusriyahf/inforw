@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-3">
            <h2 class="text-white">Pengajuan Kegiatan</h2>
            <h6 class="text-white">Buat Pengajuan Kegiatan untuk warga dengan solusi digital</h6>
        </div>
        {{-- SKTM --}}
        <div class="row">
          <div class="col-12 mt-1">
            <div class="card pl-2 p-4 mb-4">
              <div class="card-header p-0">
                <h6>Riwayat Pengajuan Kegiatan</h6>
                @can('is-warga')
                <a href="/kegiatan/create" class="btn btn-primary btn-sm ms-auto"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Kegiatan</a>
                @endcan
                @if (session()->has('success'))
                  <div class="alert alert-success col-lg-8" role="alert">
                    {{ session('success') }}
                  </div>
            </div>
                @endif
              
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table tables align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kegiatan</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RT</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)       
                      <tr>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->nama_kegiatan }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->rt }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->users->nama }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->users->alamat }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->tanggal }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                            @if ($d->status == 'disetujui')
                                <a href="/kegiatan/{{ $d->kegiatan_id }}/pdf" class="text-secondary text-xs font-weight-bold">{{ $d->status }}</a>
                            @else
                                <span class="text-secondary text-xs font-weight-bold">{{ $d->status }}</span>
                            @endif
                        </td>
                        @can('is-warga')
                        <td class="align-middle text-center">
                          <a class="btn btn-link text-dark px-1 mb-0" href="/kegiatan/{{ $d->kegiatan_id }}/edit"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
      
                          <form class="d-inline-block" method="POST" action="/kegiatan/{{$d->kegiatan_id}}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-link text-danger text-gradient px-1 mb-0" onclick="return confirm('Apakah Anda yakin menghapus data ini?');">
                                  <i class="far fa-trash-alt me-2"></i>
                              </button>
                          </form>
                        </td>
                    @endcan
                        <td class="align-middle text-center text-sm">
                          @if ($d->status == 'diproses')
                              @can('is-rt')
                                  <a href="{{ route('kegiatan.approve', $d->kegiatan_id) }}" class="btn btn-success btn-sm px-1 mb-0" onclick="return confirm('Apakah Anda yakin menyetujui kegiatan ini?');">
                                      <i class="fas fa-check"></i>
                                  </a>
                                  <a href="{{ route('kegiatan.reject', $d->kegiatan_id) }}" class="btn btn-danger btn-sm px-1 mb-0" onclick="return confirm('Apakah Anda yakin menolak kegiatan ini?');">
                                      <i class="fas fa-times"></i>
                                  </a>
                                  @endcan
                              @can('is-rw')
                                  <a href="{{ route('kegiatan.approve', $d->kegiatan_id) }}" class="btn btn-success btn-sm px-1 mb-0" onclick="return confirm('Apakah Anda yakin menyetujui kegiatan ini?');">
                                      <i class="fas fa-check"></i>
                                  </a>
                                  <a href="{{ route('kegiatan.reject', $d->kegiatan_id) }}" class="btn btn-danger btn-sm px-1 mb-0" onclick="return confirm('Apakah Anda yakin menolak kegiatan ini?');">
                                      <i class="fas fa-times"></i>
                                  </a>
                                  @endcan
                          @endif
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
</div>
@endsection
