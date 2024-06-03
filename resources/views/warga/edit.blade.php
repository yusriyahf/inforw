@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Data Warga</p>
            </div>
          </div>
          <div class="card-body">
            <form action="/warga/{{ $warga->user_id }}" method="POST">
                @method('put')
                @csrf
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nik" class="form-control-label">NIK</label>
                  <input class="form-control" type="text" name="nik" id="nik" value="{{ old('nik', $warga->nik) }}" required>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama" class="form-control-label">Nama</label>
                  <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama', $warga->nama) }}" required>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                  <input class="form-control" type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $warga->pekerjaan) }}" required>
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
                  <input class="form-control" type="text" name="notelp" id="notelp" value="{{ old('notelp', $warga->notelp) }}" required>
                    @error('notelp')
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
                        <option value="kawin" {{ old('status_perkawinan', $warga->status_perkawinan) == 'kawin' ? 'selected' : '' }}>Kawin</option>
                        <option value="belum kawin" {{ old('status_perkawinan', $warga->status_perkawinan) == 'belum kawin' ? 'selected' : '' }}>Belum Kawin</option>
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
                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="">Pilih</option>
                        <option value="laki-laki" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="perempuan" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
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
                    <label for="agama" class="form-control-label">Agama</label>
                    <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama">
                        <option value="">Pilih</option>
                        <option value="islam" {{ old('agama', $warga->agama) == 'islam' ? 'selected' : '' }}>islam</option>
                        <option value="kristen" {{ old('agama', $warga->agama) == 'kristen' ? 'selected' : '' }}>kristen</option>
                        <option value="katolik" {{ old('agama', $warga->agama) == 'katolik' ? 'selected' : '' }}>katolik</option>
                        <option value="khonghucu" {{ old('agama', $warga->agama) == 'khonghucu' ? 'selected' : '' }}>khonghucu</option>
                        <option value="budha" {{ old('agama', $warga->agama) == 'budha' ? 'selected' : '' }}>budha</option>
                        <option value="katolik" {{ old('agama', $warga->agama) == 'katolik' ? 'selected' : '' }}>katolik</option>
                    </select>
                    @error('agama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="alamat" class="form-control-label">Alamat</label>
                  <input class="form-control" type="text" name="alamat" id="alamat" value="{{ old('alamat', $warga->alamat) }}" required>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                  <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $warga->tempat_lahir) }}" required>
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
                  <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $warga->tanggal_lahir) }}" required>
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="keluarga" class="form-control-label">KK</label>
                  <input class="form-control" type="text" name="keluarga" id="keluarga" value="{{ old('keluarga', $warga->keluarga) }}" required>
                    @error('keluarga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>

              <div class="col-md-10">

              </div>
              <div class="col-md-2">
                <button class="btn btn-primary btn-sm ms-auto" type="submit">Create</button>

              </div>

            </div>
           
          </form>
          </div>
        </div>
      </div>
    
    </div>
  </div>
@endsection