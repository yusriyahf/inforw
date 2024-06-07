@extends('layouts.main')

@section('title', 'Tambah Kriteria Bansos')

@section('container')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tambah Kriteria</h5>
        <button class="btn btn-primary btn-sm" id="addKriteria">Add</button>
    </div>
    <div class="table-responsive">
      <form action="{{ route('saveKriteria',['bansos_id' => $bansos_id])}}" method="POST">
        @csrf
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kriteria</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis Kriteria</th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody id="kriteria">
            <tr>
              <td>
                <div class="d-flex px-2 py-1">
                  <div class="d-flex flex-column justify-content-center">
                    <input type="text" class="form-control" name="nama_kriteria[]" placeholder="example : Usia">
                  </div>
                </div>
              </td>
              <td class="align-middle text-center text-sm">
                <select class="form-control" name="jenis_kriteria[]">
                  <option value="benefit">Benefit</option>
                  <option value="cost">Cost</option>
                </select>
              </td>
              <td class="align-middle">
                <button type="button" class="btn btn-danger btn-sm removeKriteria">Remove</button>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="card-footer d-flex justify-content-end">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function(){
        $("#addKriteria").click(function(e){
            e.preventDefault();
            $("#kriteria").prepend(`
            <tr>
              <td>
                <div class="d-flex px-2 py-1">
                  <div class="d-flex flex-column justify-content-center">
                    <input type="text" class="form-control" name="nama_kriteria[]" placeholder="example : Usia">
                  </div>
                </div>
              </td>
              <td class="align-middle text-center text-sm">
                <select class="form-control" name="jenis_kriteria[]">
                  <option value="benefit">Benefit</option>
                  <option value="cost">Cost</option>
                </select>
              </td>
              <td class="align-middle">
                <button type="button" class="btn btn-danger btn-sm removeKriteria">Remove</button>
              </td>
            </tr>
            `);
        });

        $(document).on('click', '.removeKriteria', function() {
            $(this).closest('tr').remove();
        });
    });
</script>
@endpush
