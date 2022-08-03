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
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah">Tambah</button>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Kelas</th>
                    <th>Nama Wali Kelas</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($wali as $kelass)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $kelass->kelas->nama_kelas }}</td>
                    <td>{{ $kelass->user->name }}</td>
                    <td>
                      <button class="btn btn-warning btn-sm edit" id="{{ $kelass->id }}" data-toggle="modal" data-target="#modal-edit">Edit</button>
                      <form action="{{ route('walas.destroy', $kelass->id) }}" method="POST">
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
                      <h4 class="modal-title">Tambah wali</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{ route('walas.store') }}">
                        @csrf
                        <div class="form-group">
                          <label>Nama Guru</label>
                          <select name="user_id" class="form-control">
                            <option>Pilih Guru</option>
                            @foreach($guru as $gurus)
                            <option value="{{ $gurus->id }}">{{ $gurus->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Nama Kelas</label>
                          <select name="kelas_id" class="form-control">
                            <option>Pilih Kelas</option>
                            @foreach($kelas as $kelass)
                            <option value="{{ $kelass->id }}">{{ $kelass->nama_kelas }}</option>
                            @endforeach
                          </select>
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
                      <form method="POST" action="{{ route('walas.update') }}">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                          <label>Nama Guru</label>
                          <select name="user_id" class="form-control user_id">
                            <option>Pilih Guru</option>
                            @foreach($guru as $gurus)
                            <option value="{{ $gurus->id }}">{{ $gurus->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Nama Kelas</label>
                          <select name="kelas_id" class="form-control kelas_id">
                            <option>Pilih Kelas</option>
                            @foreach($kelas as $kelass)
                            <option value="{{ $kelass->id }}">{{ $kelass->nama_kelas }}</option>
                            @endforeach
                          </select>
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
  $(document).on('click','.edit', function(e){
    e.preventDefault();
    id = $(this).attr('id');
    $.get("" +'/walas/' + id +'/edit', function (data) {
          $('.edit-title').html("Edit Wali Kelas");
          $('#id').val(data.id);
          $('.user_id').val(data.user_id).prop('selected', true);
          $('.kelas_id').val(data.kelas_id).prop('selected', true);
          console.log(data)
      })
  })
</script>
@endsection