@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
<div class="row">
  <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
    <h2 class="text-white">Tabel Data KK</h2>
    <h6 class="text-white">Semua data KK</h6>
</div>
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tabel Data {{ $breadcrumb->title }}</h6>
          <a href="/kk/create" class="btn btn-primary btn-sm ms-auto"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
          @if (Gate::check('is-rw') || Gate::check('is-admin'))
              
            <form action="/kk" method="GET" class="row">
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
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kepala Keluarga</th>  
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RT</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $d) 
                <tr>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $d->no_kk }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $d->getkepala->nama }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $d->getrt->nama}}</span>
                  </td>      
                  
                  <td class="align-middle text-center">
                    <a class="btn btn-link text-dark px-1 mb-0" href="/kk/{{ $d->keluarga_id }}"><i class="fas fa-info-circle text-dark me-2" aria-hidden="true"></i></a>
                    <a class="btn btn-link text-dark px-1 mb-0" href="kk/{{ $d->keluarga_id }}/edit"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>

                    <form class="d-inline-block" method="POST" action="/kk/{{$d->keluarga_id}}">
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