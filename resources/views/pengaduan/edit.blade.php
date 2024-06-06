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
              <div class="col-md-12">
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
              <div class="col-md-6"></div>
              <div class="col-md-3">
                <div class="mt-3">
                    <img id="preview" src="{{ $pengaduan->gambar ? asset('gambar/' . $pengaduan->gambar) : '#' }}" alt="Preview Gambar" class="img-fluid" style="{{ $pengaduan->gambar ? '' : 'display: none;' }}">
                </div> 
                <div class="mt-3">
                    <span id="file-name text-sm">{{ $pengaduan->gambar ? $pengaduan->gambar : 'No file chosen' }}</span>
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
  
  <script>
    function previewImage() {
        var preview = document.getElementById('preview');
        var fileInput = document.getElementById('gambar');
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
        }

        if (file) {
            reader.readAsDataURL(file);
            document.getElementById('file-name').textContent = file.name;
        } else {
            preview.src = "";
            preview.style.display = 'none';
            document.getElementById('file-name').textContent = 'No file chosen';
        }
    }

    // Additional logging for debugging
    document.getElementById('gambar').addEventListener('change', function(event) {
        console.log("File input changed.");
        console.log("Selected file: ", event.target.files[0]);
        previewImage();
    });

    // Check if the image from the database is already set and display the preview
    window.addEventListener('DOMContentLoaded', (event) => {
        var preview = document.getElementById('preview');
        if (preview.src && preview.src !== '#') {
            preview.style.display = 'block';
        }
    });
</script>
@endsection