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
                    <form action="{{ route('updateBansos',['bansos_id'=>$data->bansos_id])}}" method="POST">
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
                                    <label for="jenis_bansos" class="form-control-label">Jenis</label>
                                    <select class="form-control @error('jenis_bansos') is-invalid @enderror" name="jenis_bansos" id="jenis_bansos">
                                        <option value="tunai" {{ old('jenis_bansos', $data->jenis_bansos) == 'tunai' ? 'selected' : '' }}>Tunai</option>
                                        <option value="non-tunai" {{ old('jenis_bansos', $data->jenis_bansos) == 'non-tunai' ? 'selected' : '' }}>Non-Tunai</option>
                                    </select>
                                    @error('jenis_bansos')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jumlah_penerima" class="form-control-label">Jumlah Penerima</label>
                                    <input class="form-control @error('jumlah_penerima') is-invalid @enderror" type="text" name="jumlah_penerima" id="jumlah_penerima" value="{{ old('jumlah_penerima', $data->jumlah_penerima) }}" autocomplete="off">
                                    @error('jumlah_penerima')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tipe_penerima" class="form-control-label">Tipe Penerima</label>
                                    <select class="form-control @error('tipe_penerima') is-invalid @enderror" name="tipe_penerima" id="tipe_penerima">
                                        <option value="individu" {{ old('tipe_penerima', $data->tipe_penerima) == 'individu' ? 'selected' : '' }}>Individu</option>
                                        <option value="keluarga" {{ old('tipe_penerima', $data->tipe_penerima) == 'keluarga' ? 'selected' : '' }}>Keluarga</option>
                                    </select>
                                    @error('tipe_penerima')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tgl_akhir_daftar" class="form-control-label">Tanggal Akhir Daftar</label>
                                    <input class="form-control @error('tgl_akhir_daftar') is-invalid @enderror" type="date" name="tgl_akhir_daftar" id="tgl_akhir_daftar" value="{{ old('tgl_akhir_daftar', $data->tgl_akhir_daftar) }}">
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
                                    <input class="form-control @error('tgl_penyaluran') is-invalid @enderror" type="date" name="tgl_penyaluran" id="tgl_penyaluran" value="{{ old('tgl_penyaluran', $data->tgl_penyaluran) }}">
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
                                    <a href="{{ url()->previous()}}" class="btn btn-danger btn-sm me-2">Kembali</a>
                                    <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
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
