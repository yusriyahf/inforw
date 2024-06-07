@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Data Aset</p>
                        {{-- <button class="btn btn-primary btn-sm ms-auto">Create</button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <form action="/aset/{{ $aset->aset_id }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class="form-control-label">Nama Aset</label>
                                    <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama', $aset->nama) }}" required>
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="deskripsi" class="form-control-label">Deskripsi Aset</label>
                                    <input class="form-control" type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $aset->deskripsi) }}" required>
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
                                  <input class="form-control" type="file" name="gambar" id="gambar" value="{{ old('gambar', $aset->gambar) }}">
                                    @error('gambar')
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
                                    <option value="barang" {{ old('jenis', $aset->jenis) == 'barang' ? 'selected' : '' }}>Barang</option>
                                    <option value="tempat" {{ old('jenis', $aset->jenis) == 'tempat' ? 'selected' : '' }}>Tempat</option>
                                </select>
                                    @error('jenis')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="mt-3">
                                    <img id="preview" src="{{ $aset->gambar ? asset('gambar/aset/' . $aset->gambar) : '#' }}" alt="Preview Gambar" class="img-fluid" style="{{ $aset->gambar ? '' : 'display: none;' }}">
                                </div> 
                                <div class="mt-3">
                                    <span id="file-name">{{ $aset->gambar ? $aset->gambar : 'No file chosen' }}</span>
                                </div>
                              </div>
                              <div class="col-md-10">

                              </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-sm ms-auto" type="submit">Update</button>
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
