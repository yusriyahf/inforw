@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Pengajuan Surat Keterangan Tidak Mampu</p>
            </div>
          </div>
          <div class="card-body">
            <form action="/pengumuman/{{ $data->pengumuman_id }}" method="POST">
                @method('put')
                  @csrf
          
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="judul" class="form-control-label">Judul</label>
                  <input class="form-control @error('judul') is-invalid @enderror" type="text" name="judul" id="judul" value="{{ old('judul', $data->judul) }}" autocomplete="off">
                  @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                    <label for="deskripsi" class="form-control-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                    @error('deskripsi')
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
                  <a href="/pengumuman" class="btn btn-danger btn-sm me-2">Batal</a>
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
@endsection