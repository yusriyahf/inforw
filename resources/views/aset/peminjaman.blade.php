@extends('layouts.main')

@section('container')
<div class="row">
  <div class="col-12 mt-1">
    <div class="card pl-2 p-4 mb-4">
        {{-- <div class="card-header p-0">
          <h6>Tabel Data Aset</h6>
          <a href="{{ route('aset.create') }}" class="btn btn-primary btn-sm ms-auto"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
          @if (session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
              {{ session('success') }}
            </div>
          @endif
        </div>

        <div>
          <select class="btn btn-white btn-sm">
            <option value="">Filter RT</option>
            @foreach ($rts as $rt)
              <option value="{{ $rt->nama }}">{{ $rt->nama }}</option>
            @endforeach
          </select>
        </div>  --}}
        <div class="card-header p-0 d-flex justify-content-between align-items-center">
          <div>
              <h6 class="mb-0">Permintaan Peminjaman Aset</h6>
          </div>
      </div>
      
      @if (session()->has('success'))
          <div class="alert alert-success col-lg-8 mt-3" role="alert">
              {{ session('success') }}
          </div>
      @endif
      
{{-- BATAS SUCI --}}
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table tables align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aset</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Peminjam</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Keterangan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pinjam</th>
                  @can('is-rw')
                      
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rt</th>
                  @endcan
                  {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kepemilikan</th> --}}
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($peminjaman as $index => $pinjam) 
                <tr>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $index + 1 }}</span>
                  </td>
                  
                  <td class="align-middle text-center text-sm">
                    @if (!empty($pinjam->getAset->gambar))
                        <span class="text-secondary text-xs font-weight-bold">
                            <a href="#" class="text-decoration-none text-reset" data-bs-toggle="modal" data-bs-target="#imageModal" data-image-url="gambar/aset/{{ $pinjam->getAset->gambar }}">
                                <img src="{{ asset('gambar/aset/' . $pinjam->getAset->gambar) }}" alt="Image" style="height: 150px;">
                            </a>
                        </span>
                    @else
                        <span class="text-danger text-xs font-weight-bold">Tidak ada</span>
                    @endif
                </td>
                
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $pinjam->getAset->nama }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $pinjam->getPeminjam->nama }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $pinjam->keterangan }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $pinjam->tanggal_pinjam }}</span>
                  </td>
                  @can('is-rw')

                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">
                    @if(!empty($pinjam->getRT->nama))
                    {{ $pinjam->getRT->nama }}</span>
                    @endif

                  </td>
                  @endcan
                  <td class="align-middle text-center">
                    @if ($pinjam->status == 'proses')
                    <a class="btn badge badge-sm bg-gradient-success" href="/peminjaman/{{ $pinjam->peminjaman_id}}/disetujui">
                        Setujui
                    </a>
                    <a class="btn badge badge-sm bg-gradient-danger" href="/peminjaman/{{ $pinjam->peminjaman_id}}/ditolak">
                        Tolak
                    </a>
                    @else
                        <span class="badge badge-sm 
                            @if ($pinjam->status == 'ditolak') bg-gradient-danger
                            @elseif ($pinjam->status == 'disetujui') bg-gradient-success
                            @endif">
                            {{ $pinjam->status }}
                        </span>                  
                    @endif
                    
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



 <!-- Modal -->
 <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
              <img id="modalImage" src="" class="img-fluid" alt="Image Preview">
          </div>
      </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    var imageModal = document.getElementById('imageModal');
    imageModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Button that triggered the modal
        var imageUrl = button.getAttribute('data-image-url'); // Extract info from data-* attributes
        var modalImage = document.getElementById('modalImage');
        modalImage.src = imageUrl;
    });
});
</script>
@endsection
