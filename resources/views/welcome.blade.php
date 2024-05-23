@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-12 col-sm-12 mb-xl-0 mb-5">
        <h2 class="text-white">Selamat Datang {{ Auth::user()->nama }}</h1>
        <h4 class="text-white"> @can('is-admin')
            Admin
        @elsecan('is-rw')
            Ketua RW
        @elsecan('is-rt')
            Ketua RT {{ Auth::user()->rt->nama }}
        @elsecan('is-warga')
            Warga RT {{ Auth::user()->rt->nama }}
        @endcan Kecamatan Pandanwangi</h4>
        </div>
    </div>
  </div>
@endsection