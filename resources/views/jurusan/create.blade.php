@extends('layouts.admin')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('Admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Jurusan</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
        <i class="fas fa-times"></i></button>
      </div>
    </div>

    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Input Data </h3>
        <a href="{{ url('jurusans') }}" class="btn btn-sm bg-gradient-secondary float-right">
          <i class="fa fa-arrow-left"></i> Kembali
        </a>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" action="{{ route('jurusans.store') }}" method="post">
        {{ csrf_field() }}
        <div class="card-body">
          <div class="form-group">
            <label for="example">Nama Jurusan</label>
            <input type="text" name="jurusan" class="form-control" id="" placeholder="Enter Jurusan">
          </div>
          <div class="form-group">
            <label for="example">Keterangan</label>
            <textarea type="text" name="keterangan" class="form-control" id="" placeholder="Keterangan"></textarea>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
    <!-- /.card-body -->
    <div class="card-footer">
      Footer
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
{{-- dashboard 2 --}}
</div>

@endsection
@section('script')
<!-- DataTables -->
<script src="{{ asset('Admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
@endsection
