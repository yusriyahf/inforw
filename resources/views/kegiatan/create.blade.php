@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Tambahkan pengajuan kegiatan</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/kegiatan/create" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_kegiatan" class="form-control-label">Nama Kegiatan</label>
                                    <input class="form-control @error('nama_kegiatan') is-invalid @enderror" type="text" name="nama_kegiatan" id="nama_kegiatan" value="{{ old('nama_kegiatan') }}" autocomplete="off">
                                    @error('nama_kegiatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div><div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat" class="form-control-label">Alamat Kegiatan</label>
                                    <input class="form-control @error('alamat') is-invalid @enderror" type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" autocomplete="off">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tanggal" class="form-control-label">Tanggal</label>
                                    <input class="form-control @error('tanggal') is-invalid @enderror" type="datetime-local" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" min="{{ date('Y-m-d') }}" autocomplete="off">
                                    @error('tanggal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat" class="form-control-label">Alamat Kegiatan</label>
                                        <input class="form-control @error('alamat') is-invalid @enderror" type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" autocomplete="off">
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Hidden input for status -->
                            <input type="hidden" name="status" value="proses">

                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                                <div class="d-flex justify-content-end">
                                    <a href="/kegiatan" class="btn btn-danger btn-sm me-2">Batal</a>
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
