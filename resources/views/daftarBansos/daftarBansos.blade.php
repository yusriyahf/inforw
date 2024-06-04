@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Kriteria Bansos</p>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('simpan',['bansos_id'=> $bansos_id])}}" method="POST">
                        @csrf
                        <div class="row">
                            @foreach($kriterias->kriteria as $kriteria)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="{{ $kriteria->nama_kriteria }}" class="form-control-label">{{ $kriteria->nama_kriteria }}</label>
                                    <select class="form-control" id="{{ $kriteria->nama_kriteria }}" name="{{ $kriteria->nama_kriteria }}">
                                        @foreach($kriteria->sub_kriteria as $subKriteria)
                                        <option value="{{ $subKriteria->sub_kriteria_id }}">{{ $subKriteria->nama_sub_kriteria }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
