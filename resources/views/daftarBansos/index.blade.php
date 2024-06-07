@extends('layouts.main')

@section('container')
<div class="col-xl-12 col-sm-12 mb-xl-0 mb-3">
    <h2 class="text-white">Daftar Bansos</h2>
    <h6 class="text-white">Daftar Bansos untuk warga yang ingin menerima bansos</h6>
</div>
<div class="row">
    <div class="col-12 mt-1">
      <div class="card pl-2 p-4 mb-4">
            
                <h6>Tabel Data {{ $breadcrumb->title }}</h6>
                @if (session()->has('success'))
                    <div class="alert alert-success col-lg-8" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            
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
                            @foreach ($data as $d)
                            @if ($d->tipe_penerima == 'keluarga' && $kepala || $d->tipe_penerima == 'individu')
                            <tr>
                                <td class="align-middle text-center text-sm">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
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
                                    @if ($pendaftar->isEmpty() || !$pendaftar->contains('bansos_id', $d->bansos_id))
                                        <a href="{{ route('daftar', ['bansos_id' => $d->bansos_id])}}" class="btn btn-sm btn-primary">Daftar</a>
                                    @else
                                    @foreach ($pendaftar as $p)
                                        @if ($p->bansos_id === $d->bansos_id)
                                        <span class="text-secondary text-xs font-weight-bold">{{ $p->status}}</span>
                                        @endif
                                    @endforeach
                                    @endif
                                </td>
                            </tr>
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
