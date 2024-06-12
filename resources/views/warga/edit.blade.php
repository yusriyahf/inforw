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
                    <div id="nikError" class="invalid-feedback"></div> <!-- Menampilkan pesan kesalahan -->
                    <div id="nikSuccess" class="valid-feedback">NIK sudah memenuhi syarat.</div> <!-- Menampilkan pesan sukses -->
                </div>
            </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama" class="form-control-label">Nama</label>
                  <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" value="{{ old('nama', $warga->nama) }}" required>
                  <div id="namaError" class="invalid-feedback"></div>
                    <div id="namaSuccess" class="valid-feedback">Nama sudah memenuhi syarat.</div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="pekerjaan" class="form-control-label">Pekerjaan</label>
                  <input class="form-control @error('pekerjaan') is-invalid @enderror" type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $warga->pekerjaan) }}" required>
                  <div id="pekerjaanError" class="invalid-feedback"></div>
                    <div id="pekerjaanSuccess" class="valid-feedback">Pekerjaan sudah memenuhi syarat.</div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label for="notelp" class="form-control-label">No Telp</label>
                    <div class="input-group">
                        <span class="input-group-text">+62</span>
                        <input class="form-control @error('notelp') is-invalid @enderror" type="text" name="notelp" id="notelp" value="{{ old('notelp', $warga->notelp) }}" placeholder="Nomor Telepon">
                    </div>
                    <div id="notelpError" class="invalid-feedback"></div>
                    <div id="notelpSuccess" class="valid-feedback">No Telp sudah memenuhi syarat.</div>
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
                    <div id="status_perkawinanError" class="invalid-feedback"></div>
                    <div id="status_perkawinanSuccess" class="valid-feedback">Status Perkawinan sudah memenuhi syarat.</div>
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
                    <div id="jenis_kelaminError" class="invalid-feedback"></div>
                    <div id="jenis_kelaminSuccess" class="valid-feedback">Jenis Kelamin sudah memenuhi syarat.</div>
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
                    <div id="agamaError" class="invalid-feedback"></div>
                    <div id="agamaSuccess" class="valid-feedback">Agama sudah memenuhi syarat.</div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="alamat" class="form-control-label">Alamat</label>
                  <input class="form-control @error('alamat') is-invalid @enderror" type="text" name="alamat" id="alamat" value="{{ old('alamat', $warga->alamat) }}" required>
                  <div id="alamatError" class="invalid-feedback"></div>
                    <div id="alamatSuccess" class="valid-feedback">Alamat sudah memenuhi syarat.</div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                  <input class="form-control @error('tempat_lahir') is-invalid @enderror" type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $warga->tempat_lahir) }}" required>
                  <div id="tempat_lahirError" class="invalid-feedback"></div>
                  <div id="tempat_lahirSuccess" class="valid-feedback">Tempat Lahir sudah memenuhi syarat.</div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                  <input class="form-control @error('tanggal_lahir') is-invalid @enderror" type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $warga->tanggal_lahir) }}" required>
                  <div id="tanggal_lahirError" class="invalid-feedback"></div>
                  <div id="tanggal_lahirSuccess" class="valid-feedback">Tanggal Lahir sudah memenuhi syarat.</div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label for="keluarga" class="form-control-label">KK</label>
                    <select class="form-control @error('keluarga') is-invalid @enderror" name="keluarga" id="keluarga3">
                      <option value="">Pilih KK</option>
                      @foreach($keluarga as $k)
                          <option value="{{ $k->keluarga_id }}" {{ old('keluarga', $warga->keluarga) == $k->keluarga_id ? 'selected' : '' }}>{{ $k->no_kk }} - {{ $k->getkepala->nama}}</option>
                      @endforeach
                  </select>
                  <div id="keluargaError" class="invalid-feedback"></div>
                    <div id="keluargaSuccess" class="valid-feedback">KK sudah memenuhi syarat.</div>
                </div>

              <div class="col-md-10 col-sm-9">


              </div>
              <div class="col-md-2 col-sm-3">
                <button class="btn btn-primary btn-sm ms-auto" type="submit">Save</button>

              </div>

            </div>
           
          </form>
          </div>
        </div>
      </div>
    
    </div>
  </div>

  <script>  
    $(document).ready(function() {
        $('#keluarga3').select2({
            placeholder: 'Pilih KK',
            allowClear: true
        });
    });
</script>
@endsection

@push('js')
<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Helper functions to show and clear errors and success messages
      function showError(input, errorElement, message) {
          input.classList.add('is-invalid');
          input.classList.remove('is-valid');
          errorElement.textContent = message;
      }

      function showSuccess(input, successElement) {
          input.classList.add('is-valid');
          input.classList.remove('is-invalid');
          successElement.textContent = "Sudah memenuhi syarat.";
      }

      function clearFeedback(input, errorElement, successElement) {
          input.classList.remove('is-invalid', 'is-valid');
          errorElement.textContent = '';
          successElement.textContent = '';
      }

      // Validation logic
      function validateNIK() {
          var nikInput = document.getElementById('nik');
          var nikError = document.getElementById('nikError');
          var nikSuccess = document.getElementById('nikSuccess');
          if (nikInput.value.length !== 16) {
              showError(nikInput, nikError, 'NIK harus terdiri dari 16 digit.');
          } else {
              showSuccess(nikInput, nikSuccess);
          }
      }

      function validateTextInput(id, errorId, successId, maxLength) {
          var input = document.getElementById(id);
          var errorElement = document.getElementById(errorId);
          var successElement = document.getElementById(successId);
          if (input.value.length > maxLength) {
              showError(input, errorElement, `Panjang maksimal ${maxLength} karakter.`);
          } else {
              showSuccess(input, successElement);
          }
      }

      function validateRequiredSelect(id, errorId, successId) {
          var input = document.getElementById(id);
          var errorElement = document.getElementById(errorId);
          var successElement = document.getElementById(successId);
          if (input.value === '') {
              showError(input, errorElement, 'Field ini harus diisi.');
          } else {
              showSuccess(input, successElement);
          }
      }

      function validateNumericInput(id, errorId, successId) {
          var input = document.getElementById(id);
          var errorElement = document.getElementById(errorId);
          var successElement = document.getElementById(successId);
          if (!/^\d+$/.test(input.value)) {
              showError(input, errorElement, 'Harus berupa angka.');
          } else {
              showSuccess(input, successElement);
          }
      }

      // Event listeners for real-time validation
      document.getElementById('nik').addEventListener('input', validateNIK);
      document.getElementById('nama').addEventListener('input', function() {
          validateTextInput('nama', 'namaError', 'namaSuccess', 30);
      });
      document.getElementById('pekerjaan').addEventListener('input', function() {
          validateTextInput('pekerjaan', 'pekerjaanError', 'pekerjaanSuccess', 30);
      });
      document.getElementById('notelp').addEventListener('input', function() {
          validateNumericInput('notelp', 'notelpError', 'notelpSuccess');
      });
      document.getElementById('status_perkawinan').addEventListener('change', function() {
          validateRequiredSelect('status_perkawinan', 'status_perkawinanError', 'status_perkawinanSuccess');
      });
      document.getElementById('jenis_kelamin').addEventListener('change', function() {
          validateRequiredSelect('jenis_kelamin', 'jenis_kelaminError', 'jenis_kelaminSuccess');
      });
      document.getElementById('agama').addEventListener('change', function() {
          validateRequiredSelect('agama', 'agamaError', 'agamaSuccess');
      });
      document.getElementById('alamat').addEventListener('input', function() {
          validateTextInput('alamat', 'alamatError', 'alamatSuccess', 50);
      });
      document.getElementById('tempat_lahir').addEventListener('input', function() {
          validateRequiredSelect('tempat_lahir', 'tempat_lahirError', 'tempat_lahirSuccess');
      });
      document.getElementById('tanggal_lahir').addEventListener('change', function() {
          validateRequiredSelect('tanggal_lahir', 'tanggal_lahirError', 'tanggal_lahirSuccess');
      });
      document.getElementById('keluarga3').addEventListener('change', function() {
          validateRequiredSelect('keluarga3', 'keluargaError', 'keluargaSuccess');
      });
  });
</script>

@endpush