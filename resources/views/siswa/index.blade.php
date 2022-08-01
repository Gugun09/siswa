@extends('layouts.master')
@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
 @endsection
@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm">Tambah siswa</a>
                  <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah">Tambah siswa</button> -->
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>NIS/NISn</th>
                    <th>Nama siswa</th>
                    <th>Kelas</th>
                    <th>Tahun Masuk</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($siswa as $siswas)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $siswas->user->nip }}</td>
                    <td>{{ $siswas->user->name }}</td>
                    <td>{{ $siswas->kelas->nama_kelas }}</td>
                    <td>{{ $siswas->th_angkatan }}</td>
                    <td>{!! $siswas->status == 'Y' ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>' !!}</td>
                    <td>
                      <a href="{{ route('siswa.edit', $siswas->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      <!-- <button class="btn btn-warning btn-sm edit" id="{{ $siswas->id }}" data-toggle="modal" data-target="#modal-edit">Edit</button> -->
                      <form action="{{ route('siswa.destroy', $siswas->id) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <div class="modal fade" id="modal-tambah">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Kelas</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{ route('kelas.store') }}">
                        @csrf
                        <div class="form-group">
                          <label>Kode Kelas</label>
                          <input type="text" name="kd_kelas" class="form-control" value="KL-{{ time() }}" readonly>
                        </div>
                        <div class="form-group">
                          <label>Nama Kelas</label>
                          <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                      </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.card-body -->
              <div class="modal fade" id="modal-edit">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title edit-title">Tambah Kelas</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{ route('kelas.update') }}">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                          <label>Nama Kelas</label>
                          <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" placeholder="Nama Kelas" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                      </form>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  // $(document).on('click','.edit', function(e){
  //   e.preventDefault();
  //   id = $(this).attr('id');
  //   $.get("" +'/kelas/' + id +'/edit', function (data) {
  //         $('.edit-title').html("Edit Kelas");
  //         $('#id').val(data.id);
  //         $('#nama_kelas').val(data.nama_kelas);
  //     })
  // })
</script>
@endsection