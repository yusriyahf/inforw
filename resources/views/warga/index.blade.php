@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
<div class="row">
  <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
    <h2 class="text-white">Tabel Data Warga</h2>
    <h6 class="text-white">Ini semua data warga</h6>
</div>
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tabel Data {{ $breadcrumb->title }}</h6>
          <a href="/warga/create" class="btn btn-primary btn-sm ms-auto"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</a>
          @if (Gate::check('is-rw') || Gate::check('is-admin'))
              
            <form action="/warga" method="GET" class="row">
            <label for="rt">Pilih RT:</label>
            <div class="col-sm-1">
              <div class="form-group">
                    <select name="rt" id="rt" class="form-control">
                        <option value="">All</option>
                        @foreach($daftarRT as $rt)
                            <option value="{{ $rt->rt_id }}" @if(request('rt') == $rt->rt_id) selected @endif>{{ $rt->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Filter</button>
                </div>
            </div>
          </form>
        @endif

        
        
        
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
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nik</th>  
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RT</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pekerjaan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Telp</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Perkawinan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Kelamin</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Agama</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TTL</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">KK</th>
                  
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($warga as $war) 
                <tr>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $war->nama }}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">{{ $war->nik }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $war->getkeluarga->getrt->nama}}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold">
                        @empty($war->pekerjaan)
                            <span class="text-danger">(belum diinput)</span>
                        @else
                            {{ $war->pekerjaan }}
                        @endempty
                    </span>
                </td>
                
                
                

                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold"> @empty($war->notelp)
                      <span class="text-danger">(belum diinput)</span>
                  @else
                      0{{ $war->notelp }}
                  @endempty</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold"> @empty($war->status_perkawinan)
                      <span class="text-danger">(belum diinput)</span>
                  @else
                      {{ $war->status_perkawinan }}
                  @endempty</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold"> @empty($war->jenis_kelamin)
                      <span class="text-danger">(belum diinput)</span>
                  @else
                      {{ $war->jenis_kelamin }}
                  @endempty</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold"> @empty($war->agama)
                      <span class="text-danger">(belum diinput)</span>
                  @else
                      {{ $war->agama }}
                  @endempty</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold"> @empty($war->alamat)
                      <span class="text-danger">(belum diinput)</span>
                  @else
                      {{ $war->alamat }}
                  @endempty</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">
                        @if(empty($war->tempat_lahir) || empty($war->tanggal_lahir))
                            <span class="text-danger">(belum diinput)</span>
                        @else
                            {{ $war->tempat_lahir . ', ' . $war->tanggal_lahir }}
                        @endif
                    </span>
                </td>
                
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $war->getkeluarga->no_kk}}</span>
                  </td>
                  
                  <td class="align-middle text-center">
                    <a class="btn btn-link text-dark px-1 mb-0" href="warga/{{ $war->user_id }}/edit"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>

                    <form class="d-inline-block" method="POST" action="/warga/{{$war->user_id}}">
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
    div.dataTables_wrapper div.dataTables_filter {
        text-align: left;
    }
    div.dataTables_wrapper div.dataTables_filter input {
        margin-left: 0.5em;
    }
    div.dataTables_wrapper div.dataTables_info {
        text-align: right;
    }
</style>

<script>
  $(document).ready(function() {
      var table = $('#assetTable').DataTable({ // Ensure it targets the correct ID or class
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
      });

      $('#rtFilter').on('change', function() {
          table.column(3).search(this.value).draw();   
      });
  });
</script>
@endsection