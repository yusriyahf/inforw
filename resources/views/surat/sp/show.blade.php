@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">SURAT PENGANTAR</p>
            </div>
          </div>
          <div class="card-body">
            <h6>Menerangkan bahwa</h3>
            <p>Nama: {{ $data->nama }}</p>
            <p>Jenis Kelamin: {{ $data->jenis_kelamin }}</p>
            <p>Pekerjaan: {{ $data->pekerjaan }}</p>
            <p>No KTP: {{ $data->nik }}</p>
            <p>Status Perkawinan: {{ $data->status_perkawinan }}</p>
            <p>Keperluan: {{ $data->keperluan }}</p>
            <p>Demikian surat keterangan ini kami buat untuk dipergunakan sebagaimana mestinya.</p>
                <div class="d-flex justify-content-end">
                  <a href="/surat" class="btn btn-danger btn-sm me-2">Kembali</a>
                  <button class="btn btn-primary btn-sm" type="submit">Cetak</button>
                </div>              
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection