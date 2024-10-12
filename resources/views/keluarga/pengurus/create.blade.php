@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Keluarga</p>
            </div>
          </div>
          <div class="card-body">
            <form action="/kk/create" method="POST">
                @csrf
                @can('is-rt')
                    
                <input type="hidden" value="{{ auth()->user()->getkeluarga->rt }}" name="rt">
                @endcan
               
                <input type="hidden" value="{{ auth()->user()->getkeluarga->rw }}" name="rw">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_kk" class="form-control-label">No KK</label>
                            <input class="form-control @error('no_kk') is-invalid @enderror" type="text" name="no_kk" id="no_kk" value="{{ old('no_kk') }}" autocomplete="off">
                            <div id="kkError" class="invalid-feedback"></div> <!-- Menampilkan pesan kesalahan -->
                            <div id="kkSuccess" class="valid-feedback">KK sudah memenuhi syarat.</div> <!-- Menampilkan pesan sukses -->
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kepala_keluarga" class="form-control-label">Kepala Keluarga</label>
                            <select class="form-control @error('kepala_keluarga') is-invalid @enderror" name="kepala_keluarga" id="kepala_keluarga">
                                <option value="">Pilih Kepala Keluarga</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->user_id }}" {{ old('kepala_keluarga') == $user->user_id ? 'selected' : '' }}>{{ $user->nama }}</option>
                                @endforeach
                            </select>
                            @error('kepala_keluarga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror                    
                        </div>
                    </div>
                    @can('is-rw')
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rt" class="form-control-label">RT</label>
                            <select class="form-control @error('rt') is-invalid @enderror" name="rt" id="rt">
                                <option value="">Pilih RT</option>
                                @foreach($rt as $rt)
                                    <option value="{{ $rt->rt_id }}" {{ old('rt') == $rt->rt_id ? 'selected' : '' }}>{{ $rt->nama }}</option>
                                @endforeach
                            </select>
                            @error('rt')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror                    
                        </div>
                    </div>
                    @endcan
            
                    <div class="col-md-10"></div>
                    <div class="col-md-2">
                        <div class="d-flex justify-content-end">
                            <a href="/kk" class="btn btn-danger btn-sm me-2">Batal</a>
                            <button class="btn btn-primary btn-sm" type="submit">Kirim</button>
                        </div>              
                    </div>
                </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Include jQuery -->


<script>
    $(document).ready(function() {
        $('#kepala_keluarga').select2({
            placeholder: 'Pilih Kepala Keluarga',
            allowClear: true
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function validateNIK() {
            var nikInput = document.getElementById('no_kk');
            var nikError = document.getElementById('kkError');
            var nikSuccess = document.getElementById('kkSuccess');
            if (nikInput.value.length !== 16) {
                showError(nikInput, nikError, 'KK harus terdiri dari 16 digit.');
            } else {
                showSuccess(nikInput, nikError, nikSuccess);
            }
        }
    
        function showError(input, errorElement, message) {
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');
            errorElement.textContent = message;
            errorElement.style.display = 'block';
            hideSuccess();
        }
    
        function showSuccess(input, errorElement, successElement) {
            input.classList.add('is-valid');
            input.classList.remove('is-invalid');
            errorElement.style.display = 'none'; // Hide the error message
            successElement.style.display = 'block'; // Show the success message
        }
    
        function hideSuccess() {
            var successElement = document.getElementById('kkSuccess');
            successElement.style.display = 'none';
        }
    
        var nikInput = document.getElementById('no_kk');
        nikInput.addEventListener('input', validateNIK);
    });
    </script>
@endsection
