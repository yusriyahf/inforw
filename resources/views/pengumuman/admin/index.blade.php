@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
            <h2 class="text-white">Pengumuman Warga</h2>
            <h6 class="text-white">Buat Pengumuman untuk warga dengan solusi digital</h6>
        </div>
        <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Riwayat Pengumuman</h6>
                <a href="/pengumuman/create" class="btn btn-primary btn-sm ms-auto"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                        @can('is-rw')
                  
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RT</th>
                        @endcan

                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>  
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
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->judul }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->deskripsi }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                             @if(!empty($d->gambar))
                          <span class="text-primary text-xs font-weight-bold">
                               
                                  <a href="#" class="text-decoration-none text-reset" data-bs-toggle="modal" data-bs-target="#imageModal" data-image-url="gambar/pengumuman/{{ $d->gambar }}">
                                      {{ $d->gambar }}
                                  </a>
                          </span>

                              @else
                              <span class="text-danger text-xs font-weight-bold">Empty
                              </span>
                              @endif
                      </td>
                      @can('is-rw')
                      
                      <td class="align-middle text-center text-sm">
                          @if(!empty($d->getrt->nama))
                          <span class="text-secondary text-xs font-weight-bold">{{ 
                          $d->getrt->nama }} </span>
                          @else
                          <span class="text-secondary text-xs font-weight-bold">semua </span>
                          @endif
                        </td>

                      @endcan

                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->created_at }} </span>
                        </td>
                        <td class="align-middle text-center">
                            <a class="btn btn-link text-dark px-1 mb-0" href="/pengumuman/{{ $d->pengumuman_id }}/edit"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
        
                            <form class="d-inline-block" method="POST" action="/pengumuman/{{$d->pengumuman_id}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger text-gradient px-1 mb-0" onclick="return confirm('Apakah Anda yakin menghapus data ini?');">
                                    <i class="far fa-trash-alt me-2"></i>
                                </button>
                            </form>
                            
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
@endsection