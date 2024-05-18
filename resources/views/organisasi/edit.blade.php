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
                        <span class="text-secondary text-xs font-weight-bold">{{ $organ->user->nama }}</span>
                    </td>
                    <td class="align-middle text-center text-sm">
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
    <div class="col-md-6">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Tambah Daftar Anggota</p>
              {{-- <button class="btn btn-primary btn-sm ms-auto">Create</button> --}}
            </div>
          </div>
          <div class="card-body">
            <form action="/daftarorganisasi/create" method="POST">
            @csrf
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="user_id" class="form-control-label">Nama</label>
                  <select class="form-control" name="user_id" id="user_id">
                        <option value="">Pilih</option>
                    @foreach($users as $user)
                        <option value="{{ $user->user_id }}" >{{ $user->nama }}</option>
                    @endforeach
                </select>
                    @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="hidden" name="organisasi_id" value="1">
              </div>
              
              <div class="col-md-6">
                <button class="btn btn-primary btn-sm ms-auto">Create</button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
  </div>
@endsection