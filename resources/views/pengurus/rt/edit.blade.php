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
                  <input class="form-control" type="text" name="rt" id="rt" value="{{ old('nama', $rt->nama) }}" readonly>
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
                    <select class="form-control @error('ketua') is-invalid @enderror" name="ketua" id="rt1">
                      <option value="">Pilih KK</option>
                      @foreach($warga as $k)
                          <option value="{{ $k->user_id }}" {{ old('ketua', $rt->ketua) == $k->user_id ? 'selected' : '' }}>{{ $k->nama }} - {{$k->getkeluarga->getrt->nama}}</option>
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
                    <select class="form-control @error('sekretaris') is-invalid @enderror" name="sekretaris" id="sekretaris1">
                      <option value="">Pilih KK</option>
                      @foreach($warga as $k)
                          <option value="{{ $k->user_id }}" {{ old('sekretaris', $rt->sekretaris) == $k->user_id ? 'selected' : '' }}>{{ $k->nama }} - {{$k->getkeluarga->getrt->nama}}</option>
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
                    <select class="form-control @error('bendahara') is-invalid @enderror" name="bendahara" id="bendahara1">
                      <option value="">Pilih KK</option>
                      @foreach($warga as $k)
                          <option value="{{ $k->user_id }}" {{ old('bendahara', $rt->bendahara) == $k->user_id ? 'selected' : '' }}>{{ $k->nama }} - {{$k->getkeluarga->getrt->nama}}</option>
                      @endforeach
                  </select>
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

  <script>  
    $(document).ready(function() {
        $('#rt1').select2({
            placeholder: 'Pilih RT',
            allowClear: true
        });
        $('#sekretaris1').select2({
            placeholder: 'Pilih Sekretaris',
            allowClear: true
        });
        $('#bendahara1').select2({
            placeholder: 'Pilih Bendahara',
            allowClear: true
        });
    });
</script>
@endsection