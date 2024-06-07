@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Buat Data Pengaduan</p>
            </div>
          </div>

          <div class="card-body">
            <form action="/pengaduan/create" method="POST" enctype="multipart/form-data">
            @csrf
            
            <input type="hidden" value="{{ auth()->user()->user_id }}" name="user">
            <input type="hidden" value="{{ auth()->user()->getkeluarga->rw }}" name="rw">
            <input type="hidden" value="{{ auth()->user()->getkeluarga->rt }}" name="rt">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="judul" class="form-control-label">Judul</label>
                  <input class="form-control @error('judul') is-invalid @enderror" type="text" name="judul" id="judul" value="{{ old('judul') }}">
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
              <div class="col-md-12">
                <div class="form-group">
                  <label for="deskripsi" class="form-control-label">Deskripsi</label>
                  <input class="form-control @error('deskripsi') is-invalid @enderror" type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi') }}">
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
                    <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar" id="gambar">
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-3">
              <div class="mt-3">
                <img id="preview" src="#" alt="Preview Gambar" class="img-fluid" style="display: none;">
            </div>
            </div>

              <div class="col-md-10">

              </div>
              <div class="col-md-2">
                <button class="btn btn-primary btn-sm ms-auto">Create</button>

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