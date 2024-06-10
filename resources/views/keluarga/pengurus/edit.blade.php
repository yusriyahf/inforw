@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Keluarga</p>
            </div>
          </div>
          <div class="card-body">
            <form action="/kk/{{ $data->keluarga_id }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                @can('is-rt')
                    
                <input type="hidden" name="rt" value="{{ auth()->user()->getkeluarga->rt }}">
                @endcan
          
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="no_kk" class="form-control-label">No KK</label>
                      <input class="form-control @error('no_kk') is-invalid @enderror" type="text" name="no_kk" id="no_kk" value="{{ old('no_kk', $data->no_kk) }}" autocomplete="off">
                      @error('no_kk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="kepala_keluarga" class="form-control-label">Kepala Keluarga</label>
                        <select class="form-control @error('kepala_keluarga') is-invalid @enderror" name="kepala_keluarga" id="kepala_keluarga">
                            <option value="">Pilih Kepala Keluarga</option>
                            @foreach($users as $user)
                                <option value="{{ $user->user_id }}" {{ old('kepala_keluarga', $data->kepala_keluarga) == $user->user_id ? 'selected' : '' }}>{{ $user->nama }}</option>
                            @endforeach
                        </select>
                        @error('kepala_keluarga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror                    
                    </div>
                  </div>
                  @can('is-rw')
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="rt" class="form-control-label">RT</label>
                        <select class="form-control @error('rt') is-invalid @enderror" name="rt" id="rt">
                            <option value="">Pilih RT</option>
                            @foreach($rt as $r)
                                <option value="{{ $r->rt_id }}" {{ old('rt', $data->rt) == $r->rt_id ? 'selected' : '' }}>{{ $r->nama }}</option>
                            @endforeach
                        </select>
                        @error('rt')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror                    
                    </div>
                </div>
                
                  @endcan

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

<!-- Include jQuery -->


<script>
    $(document).ready(function() {
        $('#kepala_keluarga').select2({
            placeholder: 'Pilih Kepala Keluarga',
            allowClear: true
        });
    });
</script>
@endsection
