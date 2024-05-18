@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Daftar Anggota {{ $nama_organisasi }}</h6>
          {{-- <a href="/warga/create" class="btn btn-primary btn-sm ms-auto"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a> --}}
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
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Anggota</th>
                  {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach ($organisasi as $organ)
                <tr>
                    <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold">{{ $organ->user->nama }}</span>
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
@endsection