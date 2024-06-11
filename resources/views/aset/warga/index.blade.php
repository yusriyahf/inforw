@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-3">
            <h2 class="text-white">Peminjaman Aset</h2>
            <h6 class="text-white">Peminjaman aset digital yang mudah dan tidak ribet, tidak perlu repot mengatur jadwal ketemu dengan pak rt</h6>
            <div class="col-12 mt-2">
                <a href="/aset" class="btn btn-white btn-sm ms-auto text-primary">Daftar Aset</a>
                <a href="/aset/riwayatPeminjaman" class="btn btn-white btn-sm ms-auto text-primary">Riwayat Peminjaman</a>
            </div>
        </div>

        <div class="col-12 mt-1">
            <div class="card pl-2 p-4 mb-4">
                <div class="card-header pb-1 pt-0">
                    @if (session()->has('success'))
                    <div class="alert alert-success col-lg-8" role="alert">
                        {{ session('success') }}
                    </div>
                    @elseif (session()->has('error'))
                    <div class="alert alert-danger col-lg-8" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="row">
                        @foreach ($data as $d)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100 position-relative">
                                <div class="card-img-top-wrapper" style="height: 200px; overflow: hidden;">
                                    @if (!empty($d->gambar))
                                    <a href="#" class="text-decoration-none text-reset" data-bs-toggle="modal" data-bs-target="#imageModal" data-image-url="gambar/aset/{{ $d->gambar }}">
                                        <img src="{{ asset('gambar/aset/' . $d->gambar) }}" class="card-img-top" alt="Image" style="height: 100%; width: auto; object-fit: cover;">
                                    </a>
                                    {{-- @else --}}
                                    {{-- <img src="{{ asset('default-image.png') }}" class="card-img-top" alt="No Image" style="height: 100%; width: auto; object-fit: cover;"> --}}
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $d->nama }}</h5>
                                    <p class="card-text">{{ $d->deskripsi }}</p>
                                    <p class="card-text"><small class="text-muted">Jenis: {{ $d->jenis }}</small></p>
                                    <p class="card-text">
                                        <span class="badge bg-gradient-{{ $d->status == 'tersedia' ? 'success' : 'danger' }}">{{ $d->status }}</span>
                                    </p>
                                </div>
                                @if ($d->status == 'tersedia')
                                <div class="position-absolute top-0 end-0 m-2">
                                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pinjamModal{{ $d->aset_id }}">
                                    Pinjam
                                  </button>
                                    {{-- <a href="{{ route('pinjam', ['aset_id' => $d->aset_id]) }}" class="btn btn-primary btn-sm">Pinjam</a> --}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="modal fade" id="pinjamModal{{ $d->aset_id }}" tabindex="-1" aria-labelledby="pinjamModalLabel{{ $d->aset_id }}" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                  <!-- Modal header -->
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="pinjamModalLabel{{ $d->aset_id }}">Form Peminjaman</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <!-- Modal body -->
                                  <div class="modal-body">
                                      <!-- Form to input tanggal pinjam dan keterangan -->
                                      <form action="{{ route('pinjam', ['aset_id' => $d->aset_id]) }}" method="POST">
                                          @csrf
                                          <div class="mb-3">
                                              <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                                              <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
                                          </div>
                                          <div class="mb-3">
                                              <label for="keterangan" class="form-label">Keterangan</label>
                                              <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                                          </div>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                        @endforeach
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
