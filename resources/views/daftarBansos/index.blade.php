@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-12">
        <div class="col-12 mt-2">
            <a href="{{ route('listBansosWarga')}}" class="btn btn-white btn-sm ms-auto text-primary">Daftar Bansos</a>
            <a href="{{ route('riwayatBansos')}}" class="btn btn-white btn-sm ms-auto text-primary">Riwayat</a>
        </div>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Tabel Data {{ $breadcrumb->title }}</h6>
                @if (session()->has('success'))
                    <div class="alert alert-success col-lg-8" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table tables align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bansos</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estimasi bantuan per penerima</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Penerima</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Bansos</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Akhir Pendaftaran</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Penyaluran</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $iteration = 1; @endphp
                            @foreach ($data as $d)
                            @if ($pendaftar->isEmpty() || !$pendaftar->contains('bansos_id', $d->bansos_id))                            
                            @if($d->tipe_penerima == 'keluarga' && $kepala || $d->tipe_penerima == 'individu')
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $iteration }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->nama_bansos }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->total_bantuan / $d->jumlah_penerima }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->jumlah_penerima }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->jenis_bansos }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->tgl_akhir_daftar }}</span>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $d->tgl_penyaluran }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    {{-- @if ($pendaftar->isEmpty() || !$pendaftar->contains('bansos_id', $d->bansos_id)) --}}
                                        <a href="{{ route('daftar', ['bansos_id' => $d->bansos_id])}}" class="btn btn-sm btn-primary">Daftar</a>
                                    {{-- @endif --}}
                                </td>
                            </tr>
                            @php $iteration++; @endphp
                            @endif
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
