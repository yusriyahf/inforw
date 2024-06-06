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
              <h6 class="mb-0">Tabel Data Aset</h6>
              <a href="/aset/create" class="btn btn-primary btn-sm mt-2"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
          </div>
          <div>
              <select class="btn btn-white btn-sm">
                  <option value="">Filter RT</option>
                  @foreach ($rts as $rt)
                      <option value="{{ $rt->nama }}">{{ $rt->nama }}</option>
                  @endforeach
              </select>
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
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Aset</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kepemilikan</th> --}}
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($asets as $index => $aset) 
                <tr>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $index + 1 }}</span>
                  </td>
                  
                  <td class="align-middle text-center text-sm">
                    @if (!empty($aset->gambar))
                        <span class="text-secondary text-xs font-weight-bold">
                            <a href="#" class="text-decoration-none text-reset" data-bs-toggle="modal" data-bs-target="#imageModal" data-image-url="gambar/aset/{{ $aset->gambar }}">
                                <img src="{{ asset('gambar/aset/' . $aset->gambar) }}" alt="Image" style="height: 150px;">
                            </a>
                        </span>
                    @else
                        <span class="text-danger text-xs font-weight-bold">Tidak ada</span>
                    @endif
                </td>
                
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $aset->nama }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $aset->deskripsi }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $aset->jenis }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-
                    bg-gradient-{{ $aset->status == 'tersedia' ? 'success' : 'danger' }}">{{ $aset->status }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <a class="btn btn-link text-dark px-1 mb-0" href="/aset/{{ $aset->aset_id }}/edit"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>

                    <form class="d-inline-block" method="POST" action="aset/{{$aset->id }}">
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
