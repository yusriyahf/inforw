@extends('layouts.main')

@section('container')
<div class="container-fluid py-4">
    <div class="row">
      <h1>Selamat Datang {{ auth()->user()->nama }}</h1>
    </div>
  </div>
@endsection