@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">{{ $breadcrumb->title }}</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/kegiatan/{{ $data->kegiatan_id }}" method="POST">
                        @method('put')
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_bansos" class="form-control-label">Nama Bansos</label>
                                    <input class="form-control @error('nama_bansos') is-invalid @enderror" type="text" name="nama_bansos" id="nama_bansos" value="{{ old('nama_bansos', $data->nama_bansos) }}" autocomplete="off">
                                    @error('nama_bansos')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="total_bantuan" class="form-control-label">Total Bantuan</label>
                                    <input class="form-control @error('total_bantuan') is-invalid @enderror" type="text" name="total_bantuan" id="total_bantuan" value="{{ old('total_bantuan', $data->total_bantuan) }}" autocomplete="off">
                                    @error('total_bantuan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jenis_bansos" class="form-control-label">Total Bantuan</label>
                                    <input class="form-control @error('total_bantuan') is-invalid @enderror" type="text" name="total_bantuan" id="total_bantuan" value="{{ old('total_bantuan', $data->total_bantuan) }}" autocomplete="off">
                                    @error('total_bantuan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tgl_akhir_daftar" class="form-control-label">Tanggal Akhir Daftar</label>
                                    <input class="form-control @error('tgl_akhir_daftar') is-invalid @enderror" type="date" name="tgl_akhir_daftar" id="tgl_akhir_daftar" value="{{ old('tgl_akhir_daftar', $data->tgl_akhir_daftar) }}" min="{{ date('Y-m-d') }}">
                                    @error('tgl_akhir_daftar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tgl_penyaluran" class="form-control-label">Tanggal Penyaluran</label>
                                    <input class="form-control @error('tgl_penyaluran') is-invalid @enderror" type="date" name="tgl_penyaluran" id="tgl_penyaluran" value="{{ old('tgl_penyaluran', $data->tgl_penyaluran) }}" min="{{ date('Y-m-d') }}">
                                    @error('tgl_penyaluran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-10"></div>
                            <div class="col-md-2">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ url()->previous()}}" class="btn btn-danger btn-sm me-2">Batal</a>
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
