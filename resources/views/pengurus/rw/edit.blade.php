@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Data Rukun Warga</p>
            </div>
          </div>
          <div class="card-body">
            <form action="/rw/{{ $rw->rw_id }}" method="POST">
                @method('put')
                @csrf
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="rw" class="form-control-label">RW</label>
                  <input class="form-control" type="text" name="rw" id="rw" value="{{ old('nama', $rw->nama) }}" readonly>
                    @error('rw')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <label for="ketua" class="form-control-label">Ketua</label>
                    <select class="form-control @error('ketua') is-invalid @enderror" name="ketua" id="rt2">
                      <option value="">Pilih KK</option>
                      @foreach($warga as $k)
                          <option value="{{ $k->user_id }}" {{ old('ketua', $rw->ketua) == $k->user_id ? 'selected' : '' }}>{{ $k->nama }} - {{$k->getkeluarga->getrt->nama}}</option>
                      @endforeach
                  </select>
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
                    <select class="form-control @error('sekretaris') is-invalid @enderror" name="sekretaris" id="sekretaris2">
                      <option value="">Pilih KK</option>
                      @foreach($warga as $k)
                          <option value="{{ $k->user_id }}" {{ old('sekretaris', $rw->sekretaris) == $k->user_id ? 'selected' : '' }}>{{ $k->nama }} - {{$k->getkeluarga->getrt->nama}}</option>
                      @endforeach
                  </select>
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
                    <select class="form-control @error('bendahara') is-invalid @enderror" name="bendahara" id="bendahara2">
                      <option value="">Pilih Bendahara</option>
                      @foreach($warga as $k)
                          <option value="{{ $k->user_id }}" {{ old('bendahara', $rw->bendahara) == $k->user_id ? 'selected' : '' }}>{{ $k->nama }} - {{$k->getkeluarga->getrt->nama}}</option>
                      @endforeach
                  </select>
                    @error('bendahara')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
          
              {{-- <div class="col-md-6">
                <div class="form-group">
                  <label for="ketua" class="form-control-label">Ketua</label>
                  <input class="form-control" type="text" name="ketua" id="ketua" value="{{ old('ketua', $rw->getketuarw->nama) }}" required>
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
                  <input class="form-control" type="text" name="sekretaris" id="sekretaris" value="{{ old('sekretaris', $rw->getsekretarisrw->nama) }}" required>
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
                  <input class="form-control" type="text" name="bendahara" id="bendahara" value="{{ old('bendahara', $rw->getbendahararw->nama) }}" required>
                    @error('bendahara')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div> --}}

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

  <script>  
    $(document).ready(function() {
        $('#rt2').select2({
            placeholder: 'Pilih RW',
            allowClear: true
        });
        $('#sekretaris2').select2({
            placeholder: 'Pilih Sekretaris',
            allowClear: true
        });
        $('#bendahara2').select2({
            placeholder: 'Pilih Bendahara',
            allowClear: true
        });
    });
</script>
@endsection