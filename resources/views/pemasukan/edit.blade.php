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
                    <textarea class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah">{{ old('jumlah', $data->jumlah) }}</textarea>
                    @error('jumlah')
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