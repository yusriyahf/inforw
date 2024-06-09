@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
<div class="row">
  <div class="col-12 mt-1">
    <div class="card pl-2 p-4 mb-4">
      <div class="card-header pb-1 pt-0">
          <h6>Tabel Data {{ $breadcrumb->title }}</h6>
          <form action="/laporan" method="GET" style="display: flex; align-items: flex-start;">
            @csrf
            <div class="form-group" style="margin-right: 10px;">
                <label for="tanggal">Tanggal (Bulan-Tahun):</label>
                <input type="month" id="tanggal" name="tanggal" class="form-control" value="{{ $tanggal }}" required>
            </div>
            <button type="submit" class="btn btn-primary" style="align-self: flex-end;">Submit</button>
        </form>
        
          @if (session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
              {{ session('success') }}
            </div>
          @endif
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>  
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pemasukan</th>  
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rupiah</th>  
                </tr>
              </thead>
              <tbody>
                  @foreach ($pemasukan as $pemasukan) 
                  <tr>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold"> {{ $pemasukan->tanggal }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $pemasukan->deskripsi }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ formatRupiah($pemasukan->jumlah) }}</span>
                  </td>
                </tr>
                @endforeach
                <tr>
                    <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>
                    <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>
                    <td class="align-middle text-center text-sm">
                        <span class="text-success text-xs font-weight-bold">Total</span>
                      </td>
                    <td class="align-middle text-center text-sm">
                        <span class="text-success text-xs font-weight-bold">{{ formatRupiah($totalPemasukan) }}</span>
                      </td>
                </tr>
            </table>
          </div>
        </div>
        <br>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>  
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengeluaran</th>  
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rupiah</th>  
                </tr>
              </thead>
              <tbody>
                  @foreach ($pengeluaran as $pengeluaran) 
                  <tr>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold"> {{ $pengeluaran->created_at }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $pengeluaran->deskripsi }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ formatRupiah($pengeluaran->jumlah) }}</span>
                  </td>
                </tr>
                @endforeach
                <tr>
                    <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>
                    <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>
                    <td class="align-middle text-center text-sm">
                        <span class="text-danger text-xs font-weight-bold">Total</span>
                      </td>
                    <td class="align-middle text-center text-sm">
                        <span class="text-danger text-xs font-weight-bold">{{ formatRupiah($totalPemasukan) }}</span>
                      </td>
                </tr>
                <tr>
                    <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>
                </tr>
                <tr>
                    <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>
                </tr>
                <tr>
                    <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>
                    <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>
                    <td class="align-middle text-center text-sm">
                        <span class="text-primary text-xs font-weight-bold">Saldo</span>
                      </td>
                    <td class="align-middle text-center text-sm">
                        <span class="text-primary text-xs font-weight-bold">{{ $total}}</span>
                      </td>
                </tr>
            </table>
          </div>
          
        </div>
      
      </div>
    </div>
  </div>
  </div>
@endsection