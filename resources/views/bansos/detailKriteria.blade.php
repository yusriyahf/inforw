@extends('layouts.main')

@section('title', 'Detail Kriteria')

@section('container')
<div class="card">
    <div class="card-body p-3 md-3">
        <h5 class="card-title">Detail Kriteria Bansos</h5>
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="2">Sub Kriteria</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nilai</th>
                {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th> --}}
              </tr>
            </thead>
            <tbody>
              @foreach ($sub as $d) 
              <tr>
                <td class="align-middle text-center text-sm">
                  <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-secondary text-xs font-weight-bold">{{ $kriteria->nama_kriteria}}</span>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-secondary text-xs font-weight-bold">{{ $d->nama_sub_kriteria }}</span>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-secondary text-xs font-weight-bold">{{ $d->nilai }}</span>
                </td>
                {{-- <td class="align-middle text-center">
                    <a class="btn btn-link text-dark px-1 mb-0" href="/bansos/{{ $d->bansos_id }}"><i class="fas fa-info-circle text-dark me-2" aria-hidden="true"></i></a>
                    <a class="btn btn-link text-dark px-1 mb-0" href="/bansos/{{ $d->bansos_id }}/editKriteria"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
                    
                    <form class="d-inline-block" method="POST" action="/bansos/{{$d->bansos_id}}/hapusKriteria">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger text-gradient px-1 mb-0" onclick="return confirm('Apakah Anda yakin menghapus data ini?');">
                            <i class="far fa-trash-alt me-2"></i>
                        </button>
                    </form>
                    
                </td> --}}
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('detailBansos',['bansos_id'=>$bansos_id])}}" class="btn btn-primary">Kembali</a>
        <a href="{{ route('addSubKriteria',['bansos_id'=>$bansos_id])}}" class="btn btn-primary">Tambah Sub-Kriteria</a>
    </div>
</div>

@endsection

@push('js')
    <!-- Tambahkan JS yang diperlukan di sini -->
@endpush
