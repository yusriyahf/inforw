@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Pengajuan Surat Pengantar RT RW</p>
            </div>
          </div>
          <div class="card-body">
            <form action="/sp/create" method="POST">
                  @csrf
            
            <input type="hidden" value="{{ auth()->user()->user_id }}" name="user">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama" class="form-control-label">Nama</label>
                  <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" value="{{ old('nama') }}" autocomplete="off">
                  @error('nama')
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
                        <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
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
                  <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                  <input class="form-control @error('pekerjaan') is-invalid @enderror" type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}">
                    @error('pekerjaan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="nik" class="form-control-label">NIK</label>
                  <input class="form-control @error('nik') is-invalid @enderror" type="text" name="nik" id="nik" value="{{ old('nik') }}">
                  <div id="nikFeedback" class="invalid-feedback"></div>
        <div id="nikSuccess" class="valid-feedback"></div>
                </div>
              </div>             
              
              <div class="col-md-6">
                <div class="form-group">
                    <label for="status_perkawinan" class="form-control-label">Status Perkawinan</label>
                    <select class="form-control @error('status_perkawinan') is-invalid @enderror" name="status_perkawinan" id="status_perkawinan">
                        <option value="">Pilih</option>
                        <option value="kawin" {{ old('status_perkawinan') == 'kawin' ? 'selected' : '' }}>Kawin</option>
                        <option value="belum kawin" {{ old('status_perkawinan') == 'belum kawin' ? 'selected' : '' }}>Belum Kawin</option>
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
                  <label for="keperluan" class="form-control-label">Keperluan</label>
                  <input class="form-control @error('keperluan') is-invalid @enderror" type="text" name="keperluan" id="keperluan" value="{{ old('keperluan') }}">
                    @error('keperluan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="rt" class="form-control-label">RT</label>
                  <input class="form-control @error('rt') is-invalid @enderror" type="text" name="rt" id="rt" value="4" readonly>
                  @error('rt')
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
                  <a href="/surat" class="btn btn-danger btn-sm me-2">Batal</a>
                  <button class="btn btn-primary btn-sm" type="submit">Kirim</button>
                </div>              
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        var nikInput = document.getElementById('nik');
        var nikFeedback = document.getElementById('nikFeedback');
        var nikSuccess = document.getElementById('nikSuccess');
    
        nikInput.addEventListener('input', function () {
            var inputValue = nikInput.value.trim();
            if (inputValue.length === 16) {
                // Valid input
                nikInput.classList.remove('is-invalid');
                nikInput.classList.add('is-valid');
                nikFeedback.textContent = ''; // Clear any existing error message
                nikSuccess.textContent = 'NIK sudah memenuhi syarat.';
            } else if (inputValue.length < 16) {
                // Input is too short
                nikInput.classList.remove('is-valid');
                nikInput.classList.add('is-invalid');
                nikFeedback.textContent = 'NIK harus terdiri dari 16 digit.';
                nikSuccess.textContent = '';
            } else {
                // Input is too long
                nikInput.classList.remove('is-valid');
                nikInput.classList.add('is-invalid');
                nikFeedback.textContent = 'NIK hanya boleh terdiri dari 16 digit.';
                nikSuccess.textContent = '';
            }
        });
    });
    </script>
@endsection