@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Buat Data Pengaduan</p>
              {{-- <button class="btn btn-primary btn-sm ms-auto">Create</button> --}}
            </div>
          </div>
          <div class="card-body">
            <form action="/pengaduan/create" method="POST">
            @csrf
            
            <input type="hidden" value="{{ auth()->user()->user_id }}" name="user">
            <input type="hidden" value="{{ auth()->user()->getkeluarga->rw }}" name="rw">
            <input type="hidden" value="{{ auth()->user()->getkeluarga->rt }}" name="rt">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="judul" class="form-control-label">Judul</label>
                  <input class="form-control @error('judul') is-invalid @enderror" type="text" name="judul" id="judul" value="{{ old('judul') }}">
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jenis" class="form-control-label">Jenis</label>
                  <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis">
                    <option value="">Pilih</option>
                    <option value="pengaduan" {{ old('jenis', $pengaduan->jenis) == 'Pengaduan' ? 'selected' : '' }}>Pengaduan</option>
                    <option value="saran" {{ old('jenis', $pengaduan->jenis) == 'Saran' ? 'selected' : '' }}>Saran</option>
                </select>
                    @error('jenis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="deskripsi" class="form-control-label">Deskripsi</label>
                  <input class="form-control @error('deskripsi') is-invalid @enderror" type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi') }}">
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              {{-- <div class="col-md-6">
                <div class="form-group">
                  <label for="rw" class="form-control-label">RW</label>
                  <input class="form-control @error('rw') is-invalid @enderror" type="text" name="rw" id="rw" value="{{ old('rw') }}">
                    @error('rw')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div> --}}
              {{-- <div class="col-md-6">
                <div class="form-group">
                  <label for="rt" class="form-control-label">RT</label>
                  <input class="form-control @error('rt') is-invalid @enderror" type="text" name="rt" id="rt" value="{{ old('rt') }}">
                    @error('rt')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div> --}}
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tanggal_pengaduan" class="form-control-label">Tanggal Pengaduan</label>
                  <input class="form-control @error('tanggal_pengaduan') is-invalid @enderror" type="date" name="tanggal_pengaduan" id="tanggal_pengaduan" value="{{ old('tanggal_pengaduan') }}">
                    @error('tanggal_pengaduan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              {{-- <div class="col-md-6">
                <div class="form-group">
                  <label for="password" class="form-control-label">Password</label>
                  <input class="form-control" type="password" name="password" id="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div> --}}
              {{-- <div class="col-md-6">
                <div class="form-group">
                  <label for="tempat_lahir" class="form-control-label">Tempat Lahir</label>
                  <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}">
                    @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tanggal_lahir" class="form-control-label">Tanggal Lahir</label>
                  <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div> --}}
              <div class="col-md-10">

              </div>
              <div class="col-md-2">
                <button class="btn btn-primary btn-sm ms-auto">Create</button>

              </div>

            </div>
            {{-- <hr class="horizontal dark"> --}}
            {{-- <p class="text-uppercase text-sm">Contact Information</p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Address</label>
                  <input class="form-control" type="text" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">City</label>
                  <input class="form-control" type="text" value="New York">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Country</label>
                  <input class="form-control" type="text" value="United States">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Postal code</label>
                  <input class="form-control" type="text" value="437300">
                </div>
              </div>
            </div>
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">About me</p>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">About me</label>
                  <input class="form-control" type="text" value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source.">
                </div>
              </div>
            </div> --}}
          </form>
          </div>
        </div>
      </div>
      {{-- <div class="col-md-4">
        <div class="card card-profile">
          <img src="/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
          <div class="row justify-content-center">
            <div class="col-4 col-lg-4 order-lg-2">
              <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                <a href="javascript:;">
                  <img src="/img/team-2.jpg" class="rounded-circle img-fluid border border-2 border-white">
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
            <div class="d-flex justify-content-between">
              <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
              <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a>
              <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
              <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col">
                <div class="d-flex justify-content-center">
                  <div class="d-grid text-center">
                    <span class="text-lg font-weight-bolder">22</span>
                    <span class="text-sm opacity-8">Friends</span>
                  </div>
                  <div class="d-grid text-center mx-4">
                    <span class="text-lg font-weight-bolder">10</span>
                    <span class="text-sm opacity-8">Photos</span>
                  </div>
                  <div class="d-grid text-center">
                    <span class="text-lg font-weight-bolder">89</span>
                    <span class="text-sm opacity-8">Comments</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center mt-4">
              <h5>
                Mark Davis<span class="font-weight-light">, 35</span>
              </h5>
              <div class="h6 font-weight-300">
                <i class="ni location_pin mr-2"></i>Bucharest, Romania
              </div>
              <div class="h6 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
              </div>
              <div>
                <i class="ni education_hat mr-2"></i>University of Computer Science
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
@endsection