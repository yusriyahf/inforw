@extends('layouts.main')

@section('title', 'List Pendaftar Bansos')

@section('container')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">{{ $breadcrumb->title }}</h5>
    </div>
    <div class="card-body">
        @if (now() < $bansos->tgl_akhir_daftar)
            <div class="alert alert-warning" role="alert">
                Tanggal Akhir Pendaftaran : {{ $bansos->tgl_akhir_daftar}}
            </div>
        @endif
        <div class="table-responsive">
            
            <p>Jumlah Pendaftar : {{ $bansos->getPendaftar->count() }}</p>
            <p>Kuota Penerima : {{ $bansos->jumlah_penerima }}</p>
            <form action="{{ route('simpanPenerima',['bansos_id'=>$bansos->bansos_id]) }}" method="POST">
                @csrf
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Pilih</th>
                            <th class="text-center">Rank</th>
                            <th class="text-center">Nama Pendaftar</th>
                            <th class="text-center">Skor Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasil as $pendaftarId => $data)
                            @php
                                $pendaftar = $bansos->getPendaftar->find($pendaftarId);
                                $namaPendaftar = $pendaftar->user->nama;
                                $ranking = $data['ranking'];
                                $skorAkhir = $data['skor'];
                            @endphp
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="pendaftar_id[]" value="{{ $pendaftarId }}">
                                </td>
                                <td class="text-center">{{ $ranking }}</td>
                                <td class="text-center">{{ $namaPendaftar }}</td>
                                <td class="text-center">{{ $skorAkhir }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
    <div class="card-footer">
        <a href="/bansos" class="btn btn-primary">Kembali ke Daftar Bansos</a>
        @if (now() > $bansos->tgl_akhir_daftar && now() < $bansos->tgl_penyaluran)
            <button type="submit" class="btn btn-primary">Setujui Pendaftar Terpilih</button>
    </form>
        @endif
    </div>
</div>
@endsection

@push('js')
    <!-- Tambahkan JS yang diperlukan di sini -->
@endpush
