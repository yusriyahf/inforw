@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-3">
            <h2 class="text-white">Data RT</h2>
            <h6 class="text-white">Kelola Data Pengurus RT</h6>
        </div>
        {{-- SKTM --}}
        <div class="col-12 mt-1">
          <div class="card pl-2 p-4 mb-4">
            <div class="card-header p-0">
                <h6>Data RT</h6>
            
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table tables align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">RT</th>
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
                          @empty($d->getketuart)
                            <span class="text-danger text-xs font-weight-bold">(belum diinput)</span>
                          @else
                            <span class="text-secondary text-xs font-weight-bold">{{ $d->getketuart->nama }} </span>
                          @endempty
                        </td>
                        <td class="align-middle text-center text-sm">
                          @empty($d->getsekretarisrt)
                            <span class="text-danger text-xs font-weight-bold">(belum diinput)</span>
                          @else
                            <span class="text-secondary text-xs font-weight-bold">{{ $d->getsekretarisrt->nama }} </span>
                          @endempty
                        </td>
                        <td class="align-middle text-center text-sm">
                          @empty($d->getbendaharart)
                            <span class="text-danger text-xs font-weight-bold">(belum diinput)</span>
                          @else
                            <span class="text-secondary text-xs font-weight-bold">{{ $d->getbendaharart->nama }} </span>
                          @endempty
                        </td>
                        <td class="align-middle text-center">
                            <a class="btn btn-link text-dark px-1 mb-0" href="/rt/{{ $d->rt_id }}/edit"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i></a>
        
                            <form class="d-inline-block" method="POST" action="/rt/{{$d->rt_id}}">
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