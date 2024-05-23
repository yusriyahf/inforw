@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Data Profile</p>
            </div>
          </div>
          <div class="card-body">
            <form action="/profile" method="POST">
                  @csrf
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama" class="form-control-label">Nama</label>
                  <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" value="{{ old('nama', $data->nama) }}">
                  @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nik" class="form-control-label">NIK</label>
                  <input class="form-control @error('nik') is-invalid @enderror" type="text" name="nik" id="nik" value="{{ old('nik', $data->nik) }}">
                  @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                  <input class="form-control @error('tempat_lahir') is-invalid @enderror" type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $data->tempat_lahir) }}">
                    @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                  <input class="form-control @error('tanggal_lahir') is-invalid @enderror" type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}"> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="">Pilih</option>
                        <option value="laki-laki" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="perempuan" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="status_perkawinan" class="form-control-label">Status Perkawinan</label>
                    <select class="form-control @error('status_perkawinan') is-invalid @enderror" name="status_perkawinan" id="status_perkawinan">
                        <option value="">Pilih</option>
                        <option value="kawin" {{ old('status_perkawinan', $data->status_perkawinan) == 'kawin' ? 'selected' : '' }}>Kawin</option>
                        <option value="belum kawin" {{ old('status_perkawinan', $data->status_perkawinan) == 'belum kawin' ? 'selected' : '' }}>Belum Kawin</option>
                    </select>
                    @error('status_perkawinan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                  <input class="form-control @error('pekerjaan') is-invalid @enderror" type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $data->pekerjaan) }}">
                    @error('pekerjaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="notelp" class="form-control-label">No Telp</label>
                  <input class="form-control @error('notelp') is-invalid @enderror" type="tel" name="notelp" id="notelp" value="{{ old('notelp', $data->notelp) }}">
                    @error('notelp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              
              <div class="col-md-10">

              </div>
              <div class="col-md-2">
                <div class="d-flex justify-content-end">
                  <a href="/profile" class="btn btn-danger btn-sm me-2">Batal</a>
                  <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                </div>              
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection