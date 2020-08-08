@extends('adminlte.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Daftar Pertanyaan</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Pertanyaan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
              {{session('success')}}
            </div>
        @endif
        <a href="/pertanyaan/create" class="btn btn-primary mb-3">Buat Pertanyaan Baru</a>
        <table class="table table-bordered">
          <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Judul</th>
              <th>Isi Pertanyaan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Data from database -->
            @forelse ($questions as $key => $question)
              <tr>
                <td>{{ $key + 1 }}.</td>
                <td>{{ $question->judul }}</td>
                <td>{{ $question->isi }}</td>
                <td style="display: flex;">
                  <a href="/pertanyaan/{{ $question->id }}" class="btn btn-info btn-sm">show</a>
                  <a href="/pertanyaan/{{ $question->id }}/edit" class="btn btn-default btn-sm">edit</a>
                  <form action="/pertanyaan/{{ $question->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="delete" class="btn btn-danger btn-sm">
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" align="center">Belum ada pertanyaan</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

  </div>
</section>
@endsection