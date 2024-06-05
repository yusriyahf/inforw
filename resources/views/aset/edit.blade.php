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
                    <form action="/aset/{{ $aset->id }}" method="POST">
                        @method('put')
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_aset" class="form-control-label">Nama Aset</label>
                                    <input class="form-control" type="text" name="nama_aset" id="nama_aset" value="{{ old('nama_aset', $aset->nama_aset) }}" required>
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
                                    <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $aset->status) }}" required>
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
                                    <input class="form-control" type="text" name="kepemilikan" id="kepemilikan" value="{{ old('kepemilikan', $aset->kepemilikan) }}" required>
                                    @error('kepemilikan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
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
@endsection
