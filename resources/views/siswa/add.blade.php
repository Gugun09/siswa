@extends('layouts.master')
@section('content')
<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('siswa.store') }}">
              	@csrf
                <div class="card-body">
                	<div class="form-group">
                		<label>Nama Peserta Didik</label>
                		<input type="text" name="name" class="form-control" placeholder="Nama Peserta Didik">
                	</div>
                	<div class="form-group">
                		<label>NIS/NISN</label>
                		<input type="text" name="nip" class="form-control" placeholder="NIS/NISN">
                	</div>
                	<div class="form-group">
                		<label>Email Siswa</label>
                		<input type="email" name="email" class="form-control" placeholder="Email Siswa">
                	</div>
                  <div class="row">
                    <div class="col-8">
                    <div class="form-group">
                      <label>Tempat,Tanggal Lahir</label>
                      <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat,Tanggal Lahir">
                    </div>
                    </div>
                      <div class="col-4">
                        <label>Tgl Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jk">
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Kelas Siswa</label>
                    <select class="form-control" name="kelas_id">
                      @foreach($kelas as $kelass)
                      <option value="{{ $kelass->id }}">{{ $kelass->nama_kelas }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tahun Masuk</label>
                    <input type="text" name="th_angkatan" class="form-control" placeholder="2022">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection