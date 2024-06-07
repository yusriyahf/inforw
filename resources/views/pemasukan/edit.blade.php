@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Pemasukan ges</p>
            </div>
          </div>
          <div class="card-body">
            <form action="/pemasukan/{{ $data->pemasukan_id }}" method="POST">
                @method('put')
                  @csrf
          
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="deskripsi" class="form-control-label">Deskripsi</label>
                  <input class="form-control @error('deskripsi') is-invalid @enderror" type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $data->deskripsi) }}" autocomplete="off">
                  @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="jumlah" class="form-control-label">Jumlah</label>
                  <input class="form-control @error('jumlah') is-invalid @enderror" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $data->jumlah) }}" autocomplete="off">
                  @error('jumlah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
             
            <div class="col-md-12">
              <div class="form-group">
                <label for="tanggal" class="form-control-label">Tanggal</label>
                <input class="form-control @error('tanggal') is-invalid @enderror" type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $data->tanggal) }}" autocomplete="off">
                @error('tanggal')
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
                  <a href="/pemasukan" class="btn btn-danger btn-sm me-2">Batal</a>
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