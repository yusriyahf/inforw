@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-3">
            <h2 class="text-white">Peminjaman Aset</h2>
            <h6 class="text-white">Peminjaman aset digital yang mudah dan tidak ribet, tidak perlu repot mengatur jadwal ketemu dengan pak rt</h6>
        </div>

        <div class="col-12 mt-1">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Daftar Aset yang dimiliki</h6>
                @if (session()->has('success'))
                  <div class="alert alert-success col-lg-8" role="alert">
                    {{ session('success') }}
                  </div>
                @endif
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0 " id="assetTable">
                      <thead>
                        <tr>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Aset</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">deskripsi</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis</th>
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
                            <span class="text-secondary text-xs font-weight-bold">{{ $d->nama }}</span>
                            <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold">{{ $d->deskripsi }}</span>
                              </td>
                          </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold">{{ $d->jenis }}</span>
                              </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-gradient-
                                bg-gradient-{{ $d->status == 'tersedia' ? 'success' : 'danger' }}">{{ $d->status }}</span>
                              </td>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="text-secondary text-xs font-weight-bold"><a href="#" class="text-primary">Pinjam</a></span>
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