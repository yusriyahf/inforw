@extends('layouts.main')

@section('title', 'Menentukan Bobot Kriteria')

@section('container')
<div class="card">
  <div class="card-header pb-0 p-3">
    <div class="d-flex justify-content-between">
      <h6 class="mb-2">Menentukan Bobot Kriteria</h6>
    </div>
  </div>
  <div class="table-responsive p-3">
    <form action="{{ route('saveBobot',['bansos_id' => $bansos_id]) }}" method="POST">
      @csrf
      <h5>Benefit Kriteria</h5>
      @if (session()->has('errorB'))
            <div class="alert alert-success col-lg-8" role="alert">
              {{ session('errorB') }}
            </div>
      @endif
      <table class="table align-items-center mb-3">
        <thead>
          <tr>
            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7" colspan="2">Pilih yang Lebih Penting</th>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skala (1-9)</th>
          </tr>
        </thead>
        <tbody>
          @if ($benefits->count() > 0)
            @foreach ($benefits as $index1 => $kriteria1)
              @foreach ($benefits as $index2 => $kriteria2)
                @if ($index1 < $index2)
                <tr>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="benefit_{{$kriteria1->kriteria_id}}_{{$kriteria2->kriteria_id}}" id="Radio1_{{$kriteria1->kriteria_id}}_{{$kriteria2->kriteria_id}}" value="{{ $kriteria1->kriteria_id }}">
                      <label class="form-check-label" for="Radio1_{{$kriteria1->kriteria_id}}_{{$kriteria2->kriteria_id}}">{{ $kriteria1->nama_kriteria }}</label>
                    </div>
                  </td>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="benefit_{{$kriteria1->kriteria_id}}_{{$kriteria2->kriteria_id}}" id="Radio2_{{$kriteria1->kriteria_id}}_{{$kriteria2->kriteria_id}}" value="{{ $kriteria2->kriteria_id }}">
                      <label class="form-check-label" for="Radio2_{{$kriteria1->kriteria_id}}_{{$kriteria2->kriteria_id}}">{{ $kriteria2->nama_kriteria }}</label>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="nilaiB_{{$kriteria1->kriteria_id}}_{{$kriteria2->kriteria_id}}" min="1" max="9" placeholder="1-9" class="form-control">
                    </div>
                  </td>
                </tr>
                @endif
              @endforeach
            @endforeach
          @else
            <tr>
              <td colspan="3">Tidak ada kriteria benefit yang tersedia</td>
            </tr>
          @endif
        </tbody>
      </table>

      <h5>Cost Kriteria</h5>
      @if (session()->has('errorC'))
            <div class="alert alert-success col-lg-8" role="alert">
              {{ session('errorC') }}
            </div>
      @endif
      <table class="table align-items-center mb-3">
        @if ($costs->count() > 1)
          @foreach ($costs as $index1 => $kriteria1)
            @foreach ($costs as $index2 => $kriteria2)
              @if ($index1 < $index2)
                <tr>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="cost_{{$kriteria1->kriteria_id}}_{{$kriteria2->kriteria_id}}" id="Radio1_{{$kriteria1->kriteria_id}}_{{$kriteria2->kriteria_id}}" value="{{ $kriteria1->kriteria_id }}">
                      <label class="form-check-label" for="Radio1_{{$kriteria1->kriteria_id}}_{{$kriteria2->kriteria_id}}">{{ $kriteria1->nama_kriteria }}</label>
                    </div>
                  </td>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="cost_{{$kriteria1->kriteria_id}}_{{$kriteria2->kriteria_id}}" id="Radio2_{{$kriteria1->kriteria_id}}_{{$kriteria2->kriteria_id}}" value="{{ $kriteria2->kriteria_id }}">
                      <label class="form-check-label" for="Radio2_{{$kriteria1->kriteria_id}}_{{$kriteria2->kriteria_id}}">{{ $kriteria2->nama_kriteria }}</label>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="nilaiC_{{$kriteria1->kriteria_id}}_{{$kriteria2->kriteria_id}}" min="1" max="9" placeholder="1-9" class="form-control">
                    </div>
                  </td>
                </tr>
              @endif
            @endforeach
          @endforeach
        @elseif ($costs->count() == 1)
          <tr>
            <td colspan="3">Kriteria COST cuma 1</td>
          </tr>
        @else
          <tr>
            <td colspan="3">Tidak ada kriteria cost yang tersedia</td>
          </tr>
        @endif
      </table>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>

@endsection

@push('js')
@endpush
