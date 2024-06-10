@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Tambah Data Bansos</p>
              {{-- <button class="btn btn-primary btn-sm ms-auto">Create</button> --}}
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('tambahBansos')}}" method="POST">
            @csrf
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nama_bansos" class="form-control-label">Nama Bansos</label>
                  <input class="form-control" type="text" name="nama_bansos" id="nama_basos" value="{{ old('nama_bansos') }}">
                    @error('nama_bansos')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="total_bantuan" class="form-control-label">Total Nominal Bantuan</label>
                  <input class="form-control" type="number" name="total_bantuan" id="total_bantuan" value="{{ old('total_bantuan') }}">
                    @error('total_bantuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="jenis_bansos" class="form-control-label">Jenis Bansos</label>
                  <select class="form-control" id="jenis_bansos" name="jenis_bansos">
                    <option value="tunai">Tunai</option>
                    <option value="non-tunai">Non-Tunai</option>
                  </select>
                  @error('jenis_bansos')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="jumlah_penerima" class="form-control-label">Jumlah Alokasi Penerima</label>
                  <input class="form-control" type="number" name="jumlah_penerima" id="jumlah_penerima" value="{{ old('jumlah_penerima') }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tipe_penerima" class="form-control-label">Tipe Penerima</label>
                  <select class="form-control" id="tipe_penerima" name="tipe_penerima">
                    <option value="individu">Individu</option>
                    <option value="keluarga">Keluarga</option>
                  </select>
                  @error('tipe_penerima')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tgl_akhir_daftar" class="form-control-label">Tanggal Akhir Pendaftaran</label>
                  <input class="form-control" type="date" name="tgl_akhir_daftar" id="tgl_akhir_daftar" value="{{ old('tgl_akhir_daftar') }}">
                    @error('tgl_akhir_daftar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="tgl_penyaluran" class="form-control-label">Tanggal Penyaluran</label>
                  <input class="form-control" type="date" name="tgl_penyaluran" id="tgl_penyaluran" value="{{ old('tgl_penyaluran') }}">
                    @error('tgl_penyaluran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
              </div>
              <div class="col-md-10">

              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm ms-auto">Create</button>

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