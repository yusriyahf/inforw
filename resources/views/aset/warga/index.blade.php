@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-3">
            <h2 class="text-white">Peminjaman Aset</h2>
            <h6 class="text-white">Peminjaman aset digital yang mudah dan tidak ribet, tidak perlu repot mengatur jadwal ketemu dengan pak rt</h6>
        </div>

        <div class="col-12 mt-1">
          <div class="card pl-2 p-4 mb-4">
            <div class="card-header pb-1 pt-0">
                <h6>Daftar Aset yang dimiliki</h6>
                @if (session()->has('success'))
                  <div class="alert alert-success col-lg-8" role="alert">
                    {{ session('success') }}
                  </div>
                @endif
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table tables align-items-center mb-0 " id="assetTable">
                      <thead>
                        <tr>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Aset</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">deskripsi</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($data as $d)       
                        <tr>
                          <td class="align-middle text-center text-sm">
                            <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }} </span>
                          </td>
                          <td class="align-middle text-center text-sm">
                            @if (!empty($d->gambar))
                                <span class="text-secondary text-xs font-weight-bold">
                                    <a href="#" class="text-decoration-none text-reset" data-bs-toggle="modal" data-bs-target="#imageModal" data-image-url="gambar/aset/{{ $d->gambar }}">
                                        <img src="{{ asset('gambar/aset/' . $d->gambar) }}" alt="Image" style="height: 150px;">
                                    </a>
                                </span>
                            @else
                                <span class="text-danger text-xs font-weight-bold">Tidak ada</span>
                            @endif
                        </td>
                          <td class="align-middle text-center text-sm">
                            <span class="text-secondary text-xs font-weight-bold">{{ $d->nama }}</span>
                            <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold">{{ $d->deskripsi }}</span>
                              </td>
                          </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-secondary text-xs font-weight-bold">{{ $d->jenis }}</span>
                              </td>
                            <td class="align-middle text-center text-sm">
                                <span class="badge badge-sm bg-gradient-
                                bg-gradient-{{ $d->status == 'tersedia' ? 'success' : 'danger' }}">{{ $d->status }}</span>
                              </td>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="text-secondary text-xs font-weight-bold"><a href="#" class="text-primary">Pinjam</a></span>
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