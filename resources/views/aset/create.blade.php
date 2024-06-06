@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Tambah Data Aset</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/aset/create" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="status" value="tersedia">
                            <input type="hidden" name="rt" value="{{ auth()->user()->getkeluarga->getrt->rt_id }}">
                            <input type="hidden" name="rw" value="1">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class="form-control-label">Nama Aset</label>
                                    <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" id="nama" value="{{ old('nama') }}" autocomplete="off">
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
                                    <input class="form-control @error('deskripsi') is-invalid @enderror" type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi') }}" autocomplete="off">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label for="jenis" class="form-control-label">Jenis</label>
                                  <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis">
                                    <option value="">Pilih</option>
                                    <option value="barang" {{ old('jenis') == 'barang' ? 'selected' : '' }}>Barang</option>
                                    <option value="tempat" {{ old('jenis') == 'tempat' ? 'selected' : '' }}>Tempat</option>
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
                                <img id="preview" src="#" alt="Preview Gambar" class="img-fluid" style="display: none;">
                            </div>
                        </div>

                            <div class="col-md-10">
                                <!-- Space for alignment -->
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex justify-content-end">
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
