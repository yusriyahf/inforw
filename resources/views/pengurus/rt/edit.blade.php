@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Data Rukun Tetangga</p>
            </div>
          </div>
          <div class="card-body">
            <form action="/rt/{{ $rt->rt_id }}" method="POST">
                @method('put')
                @csrf
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="rt" class="form-control-label">RT</label>
                  <input class="form-control" type="text" name="rt" id="rt" value="{{ old('nama', $rt->nama) }}" required>
                    @error('rt')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
          
              <div class="col-md-6">
                <div class="form-group">
                  <label for="ketua" class="form-control-label">Ketua</label>
                  <input class="form-control" type="text" name="ketua" id="ketua" value="{{ old('ketua', $rt->getketuart->nama) }}" required>
                    @error('ketua')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="sekretaris" class="form-control-label">Sekretaris</label>
                  <input class="form-control" type="text" name="sekretaris" id="sekretaris" value="{{ old('sekretaris', $rt->getsekretarisrt->nama) }}" required>
                    @error('sekretaris')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="bendahara" class="form-control-label">Bendahara</label>
                  <input class="form-control" type="text" name="bendahara" id="bendahara" value="{{ old('bendahara', $rt->getbendaharart->nama) }}" required>
                    @error('bendahara')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>

              <div class="col-md-10">
                <button class="btn btn-primary btn-sm ms-auto" type="submit">Simpan</button>
              </div>

            </div>
           
          </form>
          </div>
        </div>
      </div>
    
    </div>
  </div>
@endsection