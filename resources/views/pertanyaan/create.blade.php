@extends('adminlte.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Form Buat Pertanyaan Baru</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tambahkan Pertanyaan Baru</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="/pertanyaan" method="POST">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="judul">Judul Pertanyaan</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', '') }}" placeholder="Apa judul pertanyaanmu?">
              @error('judul')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="isi">Isi Pertanyaan</label>
              <textarea class="form-control" rows="3" id="isi" name="isi" placeholder="Deskripsikan isi pertanyaanmu...">{{ old('isi', '') }}</textarea>
              @error('isi')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>

  </div>
</section>
@endsection