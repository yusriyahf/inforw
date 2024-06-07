@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-12 col-sm-12 mb-2">
        <h2 class="text-white">Profil Data Diri</h2>
        <h6 class="text-white">Data diri digital</h6>
    </div>
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Data Profile</p>
              
            </div>
            @if (session()->has('success'))
            <div class="alert alert-success col-lg-6" role="alert">
              {{ session('success') }}
            </div>
          @endif
          </div>
          <div class="card-body">
            <form action="/" method="POST">
              {{-- <form action="/warga/{{ $data->user_id }}" method="POST"> --}}
                  @method('put')
                  @csrf
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama" class="form-control-label">Nama</label>
                  <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama', $data->nama) }}" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nik" class="form-control-label">NIK</label>
                  <input class="form-control" type="text" name="nik" id="nik" value="{{ old('nik', $data->nik) }}" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                  <input class="form-control" type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $data->pekerjaan) }}" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="notelp" class="form-control-label">No Telp</label>
                  <input class="form-control" type="text" name="notelp" id="notelp" value="{{ old('notelp', $data->notelp) }}" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                  <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $data->tempat_lahir) }}" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                  <input class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" readonly> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                  <input class="form-control" type="text" name="jenis_kelamin" id="jenis_kelamin" value="{{ old('jenis_kelamin', $data->jenis_kelamin) }}" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="status_perkawinan" class="form-control-label">Status Perkawinan</label>
                  <input class="form-control" type="text" name="status_perkawinan" id="status_perkawinan" value="{{ old('status_perkawinan', $data->status_perkawinan) }}" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                  <input class="form-control" type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $data->pekerjaan) }}" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="notelp" class="form-control-label">No Telp</label>
                  <input class="form-control" type="text" name="notelp" id="notelp" value="{{ old('notelp', $data->notelp) }}" readonly>
                </div>
              </div>
              
              <div class="col-md-10">

              </div>
              <div class="col-md-2">
                <a href="/profile/edit" class="btn btn-primary btn-sm ms-auto">Edit</a>
              </div>

            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection