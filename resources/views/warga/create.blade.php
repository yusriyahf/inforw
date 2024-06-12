@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Buat Data Warga</p>
            </div>
          </div>
          <div class="card-body">
            <form action="/warga/create" method="POST">
            @csrf
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nik" class="form-control-label">NIK</label>
                  <input class="form-control @error('nik') is-invalid @enderror" type="number" name="nik" id="nik" value="{{ old('nik') }}">
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama" class="form-control-label">Nama</label>
                  <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" value="{{ old('nama') }}">
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
                    <label for="notelp" class="form-control-label">No Telp</label>
                    <div class="input-group">
                        <span class="input-group-text">+62</span>
                        <input class="form-control @error('notelp') is-invalid @enderror" type="text" name="notelp" id="notelp" value="{{ old('notelp') }}" placeholder="Nomor Telepon">
                    </div>
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
                    <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="">Pilih</option>
                        <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>laki-laki</option>
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
                    <label for="agama" class="form-control-label">Agama</label>
                    <select class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama">
                        <option value="">Pilih</option>
                        <option value="islam" {{ old('agama') == 'islam' ? 'selected' : '' }}>islam</option>
                        <option value="kristen" {{ old('agama') == 'kristen' ? 'selected' : '' }}>kristen</option>
                        <option value="katolik" {{ old('agama') == 'katolik' ? 'selected' : '' }}>katolik</option>
                        <option value="khonghucu" {{ old('agama') == 'khonghucu' ? 'selected' : '' }}>khonghucu</option>
                        <option value="budha" {{ old('agama') == 'budha' ? 'selected' : '' }}>budha</option>
                        <option value="katolik" {{ old('agama') == 'katolik' ? 'selected' : '' }}>katolik</option>
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
                  <input class="form-control @error('alamat') is-invalid @enderror" type="text" name="alamat" id="alamat" value="{{ old('alamat') }}">
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
                  <input class="form-control @error('tempat_lahir') is-invalid @enderror" type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}">
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
                  <input class="form-control @error('tanggal_lahir') is-invalid @enderror" type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
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
                    <select class="form-control @error('keluarga') is-invalid @enderror" name="keluarga" id="keluarga2">
                      <option value="">Pilih KK</option>
                      @foreach($keluarga as $k)
                          <option value="{{ $k->keluarga_id }}" {{ old('keluarga') == $k->keluarga_id ? 'selected' : '' }}>{{ $k->no_kk }} - {{ $k->getkepala->nama}}</option>
                      @endforeach
                  </select>
                    @error('keluarga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

             

              <div class="col-md-10">
                <button type="submit" class="btn btn-primary btn-sm me-2">Buat</button>
              </div>
              </form>
            

            </div>
    </div>
  </div>

  <script>  
    $(document).ready(function() {
        $('#keluarga2').select2({
            placeholder: 'Pilih KK',
            allowClear: true
        });
    });
</script>
@endsection