@extends('layouts.main')

@section('container')
<div class="row">
  <div class="col-12 mt-1">
    <div class="card pl-2 p-4 mb-4">
      <div class="card-header p-0">
          <h6>Tabel Data {{ $title }}</h6>
          <a href="/warga/create" class="btn btn-primary btn-sm ms-auto"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Organisasi</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($organisasi as $organ) 
                <tr>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $organ->nama_organisasi }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <a class="btn btn-link text-dark px-1 mb-0" href="/organisasi/{{ $organ->organisasi_id }}"><i class="fas fa-info-circle text-dark me-2" aria-hidden="true"></i></a>
                    <a class="btn btn-link text-dark px-1 mb-0" href="/organisasi/{{ $organ->organisasi_id }}/edit"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
                    
                    <form class="d-inline-block" method="POST" action="/organisasi/{{$organ->organisasi_id}}">
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
@endsection