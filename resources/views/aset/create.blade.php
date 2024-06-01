@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Buat Data Aset</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('aset.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_aset" class="form-control-label">Nama Aset</label>
                                    <input class="form-control" type="text" name="nama_aset" id="nama_aset" value="{{ old('nama_aset') }}">
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
                                    <input class="form-control" type="text" name="status" id="status" value="{{ old('status') }}">
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_aset" class="form-control-label">Kepemilikan</label>
                                    <input class="form-control" type="text" name="nama_aset" id="nama_aset" value="{{ old('nama_aset') }}">
                                    @error('nama_aset')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Tambahkan form lainnya sesuai kebutuhan -->
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-end">
                                <a href="{{ route('aset.index') }}" class="btn btn-primary btn-sm">Create</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
