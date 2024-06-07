@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-12 col-sm-12 mb-xl-0 mb-3">
        <h2 class="text-white">Pengumuman</h2>
        <h6 class="text-white">Pengumumuman Untuk Seluruh Warga RT</h6>
      </div>

      <div class="col-md-10 mt-4">
        <div class="card">
          <div class="card-header pb-0 px-3">
            <h6 class="mb-0">Informasi Detail Pengumuman</h6>
          </div>
          <div class="card-body pt-4 p-3">
            <ul class="list-group">
                    
              <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                <div class="d-flex flex-column">
                    <h6 class="mb-2 text-xl">{{ $data->judul }}</h6>
                    <span class="mb-4 text-xs">Di Posting oleh: {{ $data->users->nama }} - {{ $data->created_at->translatedFormat('l, j F Y - H:i') }}</span>
            
                    @if (!empty($data->gambar))
                        <img src="{{ asset('gambar/pengumuman/' . $data->gambar) }}" alt="Image" style="width: 40%;">
                    @endif
            
                    <span class="text-sm">{{ $data->deskripsi }}</span>
                </div>
                <div class="ms-auto text-end">
                    <a class="btn btn-link text-dark px-3 mb-0" href="/pengumuman">Kembali</a>
                </div>
            </li>
            
                                         
            </ul>
          </div>
        </div>
      </div>
    </div> 
      
</div>
<!-- Modal untuk menampilkan gambar lebih besar -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="imageModalLabel">Gambar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <img id="modalImage" src="" alt="Modal Image" class="img-fluid">
          </div>
      </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      var images = document.querySelectorAll('img');
      images.forEach(function (img) {
          img.addEventListener('click', function () {
              var imageUrl = img.src;
              var modalImage = document.getElementById('modalImage');
              modalImage.src = imageUrl;
              var imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
              imageModal.show();
          });
      });
  });
  </script>
@endsection