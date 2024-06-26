@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Buat Pengumuman</p>
            </div>
          </div>
          <div class="card-body">
            <form action="/pengumuman/create" method="POST" enctype="multipart/form-data">
                  @csrf
            
            <input type="hidden" value="{{ auth()->user()->user_id }}" name="user">
            @can('is-rt')
            <input type="hidden" value="{{ auth()->user()->getkeluarga->rt }}" name="rt">
            @endcan
            @can('is-rw')
            <input type="hidden" value="{{ auth()->user()->getkeluarga->rw }}" name="rw">
            @endcan
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="judul" class="form-control-label">Judul</label>
                  <input class="form-control @error('judul') is-invalid @enderror" type="text" name="judul" id="judul" value="{{ old('judul') }}" autocomplete="off">
                  @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="gambar" class="form-control-label">Gambar</label>
                    <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar" id="gambar">
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    
                </div>
            </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="deskripsi" class="form-control-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
              <div class="mt-3">
                <img id="preview" src="#" alt="Preview Gambar" class="img-fluid" style="display: none;">
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
  <script>
    function previewImage() {
        var preview = document.getElementById('preview');
        var file    = document.getElementById('gambar').files[0];
        var reader  = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.style.display = 'none';
        }
    }

    // Additional logging for debugging
    document.getElementById('gambar').addEventListener('change', function(event) {
        console.log("File input changed.");
        console.log("Selected file: ", event.target.files[0]);
        previewImage();
    });
</script>
@endsection