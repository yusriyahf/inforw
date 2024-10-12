@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-3">
            <h2 class="text-white">Data RW</h2>
            <h6 class="text-white">Kelola Data Pengurus RW</h6>
        </div>
        {{-- SKTM --}}
        <div class="col-12 mt-1">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Data RW</h6>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RW</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ketua</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sekretaris</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bendahara</th>
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
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->nama }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->getketuarw->nama }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->getsekretarisrw->nama }} </span>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-xs font-weight-bold">{{ $d->getbendahararw->nama }} </span>
                        </td>
                        <td class="align-middle text-center">
                            <a class="btn btn-link text-dark px-1 mb-0" href="/rw/{{ $d->rw_id }}/edit"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
        
                            <form class="d-inline-block" method="POST" action="/rw/{{$d->rw_id}}">
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
@endsection