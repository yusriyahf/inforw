@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">

<div class="row">
  <div class="col-xl-12 col-sm-12 mb-xl-0 mb-3">
    <h2 class="text-white">Pengaduan</h2>
    <h6 class="text-white">Buat Pengaduan lebih mudah</h6>
  </div>
  <div class="col-12 mt-1">
    <div class="card pl-2 p-4 mb-4">
        <div class="card-header p-0">
          <h6>Tabel Data {{ $breadcrumb->title }}</h6>
          @can('is-warga')
          <a href="/pengaduan/create" class="btn btn-primary btn-sm ms-auto"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
          @endcan
          @if (session()->has('success'))
            <div class="alert alert-success col-lg-8" role="alert">
              {{ session('success') }}
            </div>
          @endif
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                  @if (Gate::check('is-rw') || Gate::check('is-rt'))
                      
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Warga</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RT</th>
                  @endif

                  @can('is-warga')
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  @endcan
                </tr>
              </thead>
              <tbody>
                @foreach ($pengaduan as $pn) 
                <tr>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $pn->judul }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $pn->deskripsi }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $pn->jenis }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-primary text-xs font-weight-bold">
                        <a href="#" class="text-decoration-none text-reset" data-bs-toggle="modal" data-bs-target="#imageModal" data-image-url="gambar/{{ $pn->gambar }}">
                            {{ $pn->gambar }}
                        </a>
                    </span>
                </td>
                
                  
                  @if (Gate::check('is-rw') || Gate::check('is-rt'))
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $pn->users->nama}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $pn->getrt->nama   }}</span>
                  </td>
                  @endif
                  @can('is-warga')
                  <td class="align-middle text-center">
                    <a class="btn btn-link text-dark px-1 mb-0" href="/pengaduan/{{ $pn->pengaduan_id }}/edit"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
                    <form class="d-inline-block" method="POST" action="/pengaduan/{{$pn->pengaduan_id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger text-gradient px-1 mb-0" onclick="return confirm('Apakah Anda yakin menghapus data ini?');">
                            <i class="far fa-trash-alt me-2"></i>
                        </button>
                    </form>                   
                  </td>
                  @endcan
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

  <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<!-- Custom CSS -->
<style>
    table.dataTable.no-footer {
        border-bottom: 1px solid #e0e0e0; /* Change this color to the desired border color */
    }
</style>

<script>
    $(document).ready(function() {
        $('.table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

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