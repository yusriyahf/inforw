@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-3">
            <h2 class="text-white">Pemasukan Keuangan</h2>
            <h6 class="text-white">Buat Pemasukan Keuangan untuk warga dengan solusi digital</h6>
           
        </div>
        {{-- SKTM --}}
        <div class="col-12 mt-1">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Riwayat Pemasukan Keuangan</h6>
                <a href="/pemasukan/create" class="btn btn-primary btn-sm ms-auto"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
                <form action="/pemasukan" method="GET" style="display: flex; align-items: flex-start;">
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
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
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
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->deskripsi }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->jumlah }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->users->nama }} </span>
                        </td>
                        {{-- <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->getrt }} </span>
                        </td> --}}
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->created_at }} </span>
                        </td>
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