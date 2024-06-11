@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
<div class="row">
  <div class="col-12 mt-1">
    <div class="card pl-2 p-4 mb-4">
      <div class="card-header pb-1 pt-0">
          <h6>Tabel Data {{ $breadcrumb->title }}</h6>
          @can('is-bendahara')
          <a href="/pengeluaran/create" class="btn btn-primary btn-sm ms-auto"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
          @endcan
          @if (Gate::check('is-rw') || Gate::check('is-admin'))
              
          <form action="/pengeluaran" method="GET" class="row">
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
          <form action="/pengeluaran" method="GET" style="display: flex; align-items: flex-start;">
            @csrf
            <div class="form-group" style="margin-right: 10px;">
                <label for="tanggal">Tanggal (Bulan-Tahun):</label>
                <input type="month" id="tanggal" name="tanggal" class="form-control" value="{{ $tanggal }}" required>
            </div>
            <button type="submit" class="btn btn-primary" style="align-self: flex-end;">Submit</button>
        </form>
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                  <div class="card-body p-3">
                      <div class="row">
                          <div class="col-8">
                              <div class="numbers">
                                  <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                      Jenis Iuran Keluar
                                  </p>
                                  <h5 class="font-weight-bolder">{{ $jumlahPengeluaran }}</h5>
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
                                      Total Pengeluaran
                                  </p>
                                  <h5 class="font-weight-bolder">{{ formatRupiah($totalPengeluaran) }}</h5>
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
      
        {{-- <h6>Jenis Iuran Keluar: {{ $jumlahPengeluaran }}</h6> --}}
        {{-- <h6>total Pengeluaran: {{ formatRupiah($totalPengeluaran) }}</h6> --}}
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
                @foreach ($pengeluaran as $pgl) 
                <tr>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $pgl->deskripsi }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $pgl->jumlah }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $pgl->tanggal }}</span>
                  </td>
                  @can('is-rw')
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $pgl->getrt->nama }}</span>
                    </td>
                  @endcan
                  @can('is-bendahara')
                  <td class="align-middle text-center">
                    <a class="btn btn-link text-dark px-1 mb-0" href="pengeluaran/{{ $pgl->pengeluaran_id }}/edit"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>

                    <form class="d-inline-block" method="POST" action="/pengeluaran/{{$pgl->pengeluaran_id}}">
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
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection