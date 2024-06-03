@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Data Pengaduan</p>
            </div>
          </div>
          <div class="card-body">
            <form action="/pengaduan/{{ $pengaduan->pengaduan_id}}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
            
            <input type="hidden" value="{{ auth()->user()->user_id }}" name="user">
            <input type="hidden" value="{{ auth()->user()->getkeluarga->rw }}" name="rw">
            <input type="hidden" value="{{ auth()->user()->getkeluarga->rt }}" name="rt">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="judul" class="form-control-label">Judul</label>
                  <input class="form-control" type="text" name="judul" id="judul" value="{{ old('judul', $pengaduan->judul) }}" required>
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jenis" class="form-control-label">Jenis</label>
                  <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis">
                    <option value="">Pilih</option>
                    <option value="pengaduan" {{ old('jenis', $pengaduan->jenis) == 'pengaduan' ? 'selected' : '' }}>Pengaduan</option>
                    <option value="saran" {{ old('jenis', $pengaduan->jenis) == 'saran' ? 'selected' : '' }}>Saran</option>
                </select>
                    @error('jenis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="deskripsi" class="form-control-label">Deskripsi</label>
                  <input class="form-control" type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $pengaduan->deskripsi) }}">
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="gambar" class="form-control-label">Gambar</label>
                  <input class="form-control" type="file" name="gambar" id="gambar" value="{{ old('gambar', $pengaduan->gambar) }}">
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tanggal_pengaduan" class="form-control-label">Tanggal Pengaduan</label>
                  <input class="form-control" type="date" name="tanggal_pengaduan" id="tanggal_pengaduan" value="{{ old('tanggal_pengaduan', $pengaduan->tanggal_pengaduan) }}">
                    @error('tanggal_pengaduan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-10">

              </div>
              <div class="col-md-2">
                <button class="btn btn-primary btn-sm ms-auto" type="submit">Edit</button>

              </div>

            </div>
          </form>
          </div>
        </div>
      </div>
     
    </div>
  </div>
  
@endsection