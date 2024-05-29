@extends('layouts.main')

@section('title', 'Detail Bansos')

@section('container')
<div class="card mb-4">
  <div class="card-body">
      <h5 class="card-title">{{ $bansos->nama_bansos }}</h5>
      <div class="table-responsive">
          <table class="table">
              <tbody>
                  <tr>
                      <th scope="row">Total Bantuan</th>
                      <td>{{ $bansos->total_bantuan }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Jenis</th>
                      <td>{{ $bansos->jenis_bansos }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Jumlah Penerima</th>
                      <td>{{ $bansos->jumlah_penerima }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Tipe Penerima</th>
                      <td>{{ $bansos->tipe_penerima }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Tanggal Akhir Pendaftaran</th>
                      <td>{{ $bansos->tgl_akhir_daftar }}</td>
                  </tr>
                  <tr>
                      <th scope="row">Tanggal Penyaluran</th>
                      <td>{{ $bansos->tgl_penyaluran }}</td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</div>


<div class="card">
    <div class="card-header">
        <h5 class="card-title">Kriteria Bansos</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Kriteria</th>
                        <th class="text-center">Jenis</th>
                        <th class="text-center">Bobot</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriterias as $kriteria) 
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $kriteria->nama_kriteria}}</td>
                        <td class="text-center">{{ $kriteria->jenis_kriteria }}</td>
                        <td class="text-center">{{ $kriteria->bobot }}</td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-info" href="{{ route('showSubKriteria', ['bansos_id' => $bansos->bansos_id, 'kriteria_id' => $kriteria->kriteria_id])}}">
                                <i class="fas fa-info-circle"></i> Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <a href="/bansos" class="btn btn-primary">Kembali ke Daftar Bansos</a>
    </div>
</div>
@endsection

@push('js')
    <!-- Tambahkan JS yang diperlukan di sini -->
@endpush
