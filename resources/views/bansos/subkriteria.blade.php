@extends('layouts.main')

@section('title', 'Tambah Sub Kriteria Bansos')

@section('container')
<form action="{{ route('saveSubKriteria',['bansos_id' => $bansos_id]) }}" method="POST">
    @csrf
    @foreach ($kriterias as $kriteria)
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ $kriteria->nama_kriteria }}</h5>
            <button class="btn btn-primary btn-sm addSubKriteria" data-kriteria-id="{{ $kriteria->kriteria_id }}">Add</button>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sub Kriteria</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nilai</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody class="subKriteria">
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <input type="text" class="form-control" name="nama_sub_kriteria[]" placeholder="example: < 34 tahun">
                                    <input type="hidden" name="kriteria_id[]" value="{{ $kriteria->kriteria_id }}">
                                    @error('nama_sub_kriteria[]')
                                      <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <input type="number" class="form-control" name="nilai[]" placeholder="example: 4">
                                    @error('nilai[]')
                                      <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            <button type="button" class="btn btn-danger btn-sm removeKriteria">Remove</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
    <div class="card-footer d-flex">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</form>
@endsection

@push('js')
<script>
    $(document).ready(function(){
        $(".addSubKriteria").click(function(e){
            e.preventDefault();
            var kriteriaId = $(this).data('kriteria-id');
            var newRow = `
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <input type="text" class="form-control" name="nama_sub_kriteria[]" placeholder="example: < 34 tahun">
                                <input type="hidden" name="kriteria_id[]" value="` + kriteriaId + `">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <input type="number" class="form-control" name="nilai[]" placeholder="example: 4">
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <button type="button" class="btn btn-danger btn-sm removeKriteria">Remove</button>
                    </td>
                </tr>
            `;
            $(this).closest('.card').find('.subKriteria').prepend(newRow);
        });

        $(document).on('click', '.removeKriteria', function() {
            $(this).closest('tr').remove();
        });
    });
</script>
@endpush
