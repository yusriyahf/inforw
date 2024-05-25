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
            <h6 class="mb-0">Informasi Pengumuman</h6>
          </div>
          <div class="card-body pt-4 p-3">
            <ul class="list-group">
                @foreach ($data as $d)
                    
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                    <div class="d-flex flex-column w-100">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0 text-sm me-3">{{ $d->judul }}</h6>
                            <span class="mb-0 text-xs">By : {{ $d->users->nama }} - {{ $d->created_at->translatedFormat('l, j F Y - H:i') }}</span>
                        </div>
                        <span class="text-xs mt-2">{{ $d->deskripsi }}</span>
                    </div>
                    <div class="ms-auto text-end">
                        <a class="btn btn-link text-dark px-3 mb-0" href="/pengumuman/{{ $d->pengumuman_id }}">Detail</a>
                    </div>
                </li>
                
                         
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div> 
      
</div>
@endsection