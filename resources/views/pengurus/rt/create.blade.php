@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Tambah Data Rukun Tetangga</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/rt/create" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class="form-control-label">RT</label>
                                    <input class="form-control @error('rt') is-invalid @enderror" type="number" name="rt" id="rt" value="{{ old('rt') }}" autocomplete="off">
                                    @error('rt')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" class="form-control-label">Ketua</label>
                                    <input class="form-control @error('ketua') is-invalid @enderror" type="text" name="ketua" id="ketua" value="{{ old('ketua') }}">
                                    @error('ketua')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rt" class="form-control-label">Sekretaris</label>
                                    <input class="form-control @error('sekretaris') is-invalid @enderror" type="text" name="sekretaris" id="sekretaris" value="{{ old('sekretaris') }}">
                                    @error('sekretaris')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rt" class="form-control-label">Bendahara</label>
                                    <input class="form-control @error('bendahara') is-invalid @enderror" type="text" name="bendahara" id="bendahara" value="{{ old('bendahara') }}">
                                    @error('bendahara')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn-sm me-2">Tambahkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
