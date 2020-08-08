@extends('adminlte.master')

@section('content')
<section class="content pt-3">
  <div class="container-fluid">
    <h4>{{ $question->judul }}</h4>
    <p>{{ $question->isi }}</p>
  </div>
</section>
@endsection