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
    <a href="{{ route('jurusans.create') }}" class="btn btn-block btn-default bg-gradient-primary">
      <i class="fas fa-plus"></i> Tambah Data
    </a>
    <div class="card-body">
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th>Jurusan</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($jurusans as $j => $jurusan)
            <tr>
              <td>{{ $j+1 }}</td>
              <td>{{ $jurusan->jurusan }}</td>
              <td>{{ $jurusan->keterangan }}</td>
              <td><center>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger" onclick="destroy({{$jurusan->id}})" data-toggle="tooltip" data-placement="right" title="Hapus Data"><i class="fas fa-trash"></i></button>
                                
                                <a href="{{ route('jurusans.edit',$jurusan->id) }}" role="button" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Edit Data"><i class="fas fa-edit"></i></a>
                            </div>
                        </center></td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Jurusan</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
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

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
  </div> --}}
  @endsection
  @section('script')
  <!-- DataTables -->
  <script src="{{ asset('Admin/plugins/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

  <script type="text/javascript">
    $(()=>{
        console.log("user page");
    });

    const destroy = (id)=>{
        swal({
            type:"warning",
            title:"Apakah Anda Yakin?",
            text:"Anda Tidak Akan Dapat Mengembalikan Data Ini!",
            showCancelButton:true,
            cancelButtonText: "Batal",
            cancelButtonColor:"#3085d6",
            confirmButtonText:"Ya, Saya Yakin!",
            confirmButtonColor:"#d33"
        }).then(result=>{
            if(result.value){
                let access = {
                    id:id,
                    _method:'delete',
                    _token:"{{csrf_token()}}"
                }
                $.post("{{ url('jurusans') }}/"+id,access)
                .done(res=>{
                    console.log(res);
                    swal({
                        title:"Berhasil!",
                        text:"Anda Berhasil Menghapus Data",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('jurusans') }}";
                    })
                }).fail(err=>{
                    console.log(err);
                }); 
            }
        });
    }

</script>
  @endsection
