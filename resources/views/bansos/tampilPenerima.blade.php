@extends('layouts.main')

@section('title', 'List Penerima Bansos')

@section('container')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">{{ $breadcrumb->title }}</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <p>Bansos : {{ $bansos->nama_bansos }}</p>
            <p>Tipe Penerima : {{ $bansos->tipe_penerima }}</p>
            <p>Kuota Awal Penerima : {{ $bansos->jumlah_penerima }}</p>
            <p>Jumlah Pendaftar : {{ $bansos->getPendaftar->count() }}</p>
            <p>Jumlah Penerima : {{ $bansos->getPendaftar->where('status','disetujui')->count() }}</p>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Rank</th>
                            <th class="text-center">Nama Penerima</th>
                            <th class="text-center">Skor Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bansos->getPendaftar->where('status','disetujui') as $penerima => $data)
                            <tr>
                                <td class="text-center">{{ $data->rank }}</td>
                                <td class="text-center">{{ $data->user->nama }}</td>
                                <td class="text-center">{{ $data->hasil_akhir }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
    <div class="card-footer">
        <a href="/bansos" class="btn btn-primary">Kembali ke Daftar Bansos</a>
        @if (now() < $bansos->tgl_penyaluran)
            <a class="btn btn-primary" href="{{ route('tampilPendaftar', ['bansos_id'=>$bansos->bansos_id])}}">Edit Penerima</a>
        @endif
    </div>
</div>
@endsection

@push('js')
    <!-- Tambahkan JS yang diperlukan di sini -->
@endpush
