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
                    <a href="/aset" class="btn btn-primary btn-sm mt-3">Tambah Aset</a>
                </div>
                <div class="card-body">
                    <form action="/aset/create" method="POST">
                        @csrf
                        <input type="hidden" value="{{ auth()->user()->user_id }}" name="user_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_aset" class="form-control-label">Nama Aset</label>
                                    <input class="form-control @error('nama_aset') is-invalid @enderror" type="text" name="nama_aset" id="nama_aset" value="{{ old('nama_aset') }}" autocomplete="off">
                                    @error('nama_aset')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" class="form-control-label">Status</label>
                                    <input class="form-control @error('status') is-invalid @enderror" type="text" name="status" id="status" value="{{ old('status') }}">
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kepemilikan" class="form-control-label">Kepemilikan</label>
                                    <input class="form-control @error('kepemilikan') is-invalid @enderror" type="text" name="kepemilikan" id="kepemilikan" value="{{ old('kepemilikan') }}">
                                    @error('kepemilikan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-10">
                                <!-- Space for alignment -->
                            </div>
                            <div class="col-md-2">
                                <div class="d-flex justify-content-end">
                                    <a href="/aset" class="btn btn-primary btn-sm me-2">Tambahkan</a>
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
