@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 mt-1">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Riwayat Pemasukan Keuangan</h6>
                @can('is-bendahara')
                <a href="/pemasukan/create" class="btn btn-primary btn-sm ms-auto"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
                @endcan
                @if (Gate::check('is-rw') || Gate::check('is-admin'))
              
            <form action="/pemasukan" method="GET" class="row">
            <label for="rt">Pilih RT:</label>
            <div class="col-sm-1">
              <div class="form-group">
                    <select name="rt" id="rt" class="form-control">
                        <option value="">All</option>
                        @foreach($daftarRT as $rt)
                            <option value="{{ $rt->rt_id }}" @if(request('rt') == $rt->rt_id) selected @endif>{{ $rt->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Filter</button>
                </div>
            </div>
          </form>
        @endif
                <form action="/pemasukan" method="GET" style="display: flex; align-items: flex-start;">
                  @csrf
                  <div class="form-group" style="margin-right: 10px;">
                      <label for="tanggal">Tanggal (Bulan-Tahun):</label>
                      <input type="month" id="tanggal" name="tanggal" class="form-control" value="{{ $tanggal }}" required>
                  </div>
                  <button type="submit" class="btn btn-primary" style="align-self: flex-end;">Submit</button>
              </form>
              <div class="row">
                <div class="col-md-5 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                            Total Iuran
                                        </p>
                                        <h5 class="font-weight-bolder">{{ $totalIuran }}</h5>
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
                <div class="col-md-5 col-sm-6 mb-4">
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
                                        <i class="fas fa-mail-bulk text-lg opacity-10" style="color: #ffffff;"></i>
                                        {{-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
 
              {{-- <h6>Jenis Iuran Masuk: {{ $totalIuran }}</h6> --}}
              {{-- <h6>total saldo: {{ formatRupiah($totalSaldo) }}</h6> --}}
                @if (session()->has('success'))
                  <div class="alert alert-success col-lg-8" role="alert">
                    {{ session('success') }}
                  </div>
                @endif
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table tables align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                        @can('is-rw')
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RT</th>
                        @endcan
                        @can('is-bendahara')
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        @endcan
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)       
                      <tr>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->deskripsi }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ formatRupiah($d->jumlah) }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->users->nama }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->tanggal }} </span>
                        </td>
                        @can('is-rw')
                            
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->getrt->nama }} </span>
                          </td>
                        @endcan
                        @can('is-bendahara')
                        <td class="align-middle text-center">
                            <a class="btn btn-link text-dark px-1 mb-0" href="/pemasukan/{{ $d->pemasukan_id }}/edit"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
        
                            <form class="d-inline-block" method="POST" action="/pemasukan/{{$d->pemasukan_id}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger text-gradient px-1 mb-0" onclick="return confirm('Apakah Anda yakin menghapus data ini?');">
                                    <i class="far fa-trash-alt me-2"></i>
                                </button>
                            </form>
                            
                          </td>
                          @endcan
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