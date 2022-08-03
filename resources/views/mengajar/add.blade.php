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
              <form action="{{ route('jadwal.store') }}" method="POST">
              	@csrf
                <div class="card-body">
                	<div class="row">
                		<div class="col-4">
		                  <div class="form-group">
		                    <label for="kp">Kode Pelajaran</label>
		                    <input type="text" class="form-control" name="kode_pelajaran" id="kp" value="MPL-{{ time() }}" readonly="">
		                  </div>
                		</div>
                		<div class="col-4">
		                  <div class="form-group">
		                    <label for="tp">Tahun Pelajaran</label>
		                    <input type="hidden" class="form-control" id="tp" name="id_thajaran" value="{{ $thajaran['id'] }}" readonly="">
		                    <input type="text" class="form-control" id="tp" readonly="" placeholder="{{ $thajaran['tahun_ajaran'] }}">
		                  </div>
                		</div>
                		<div class="col-4">
		                  <div class="form-group">
		                    <label for="smt">Semester</label>
		                    <input type="hidden" class="form-control" id="smt" name="id_semester" value="{{ $semester['id'] }}" readonly="">
		                    <input type="text" class="form-control" id="smt" readonly="" placeholder="{{ $semester['semester'] }}">
		                  </div>
                		</div>
                	</div>
                	<div class="row">
                		<div class="col-md-6">
							<div class="form-group">
								<label>Guru Mata Pelajaran</label>
								<select name="id_user" class="form-control">
									<option value="">- Pilih -</option>
									@foreach($guru as $gurus)
									<option value="{{ $gurus->id }}">{{ $gurus->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Mata Pelajaran</label>
								<select name="id_mapel" class="form-control">
									<option value="">- Pilih -</option>
									@foreach($mapel as $mapels)
									<option value="{{ $mapels->id }}">[ {{$mapels->kode_mapel}} ] {{ $mapels->mapel }}</option>
									@endforeach
								</select>
							</div>
						</div>
                	</div>
                	<div class="row">
						<div class="col-md-6">											
								<div class="form-check">
									<label>Hari</label><br/>
									<label class="form-radio-label">
										<input class="form-radio-input" type="radio" name="hari" value="Senin">
										<span class="form-radio-sign">Senin</span>
									</label>
									<label class="form-radio-label">
										<input class="form-radio-input" type="radio" name="hari" value="Selasa">
										<span class="form-radio-sign">Selasa</span>
									</label>
									<label class="form-radio-label">
										<input class="form-radio-input" type="radio" name="hari" value="Rabu">
										<span class="form-radio-sign">Rabu</span>
									</label>
									<label class="form-radio-label">
										<input class="form-radio-input" type="radio" name="hari" value="Kamis">
										<span class="form-radio-sign">Kamis</span>
									</label>
									<label class="form-radio-label">
										<input class="form-radio-input" type="radio" name="hari" value="Jum'at">
										<span class="form-radio-sign">Jum'at</span>
									</label>
									<label class="form-radio-label">
										<input class="form-radio-input" type="radio" name="hari" value="Sabtu">
										<span class="form-radio-sign">Sabtu</span>
									</label>

								</div>
							</div>
							<div class="col-md-6">	
									<label>Kelas</label>
								<select name="id_kelas" class="form-control">
									<option value="">- Pilih -</option>
									@foreach($kelas as $kelass)
									<option value="{{ $kelass->id }}">{{ $kelass->nama_kelas }}</option>
									@endforeach
								</select>


							</div>
						</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
			                  <label>Waktu Mulai</label>
			                    <div class="input-group date" id="waktu_mulai" data-target-input="nearest">
			                        <input type="date" name="jam_awal" class="form-control datetimepicker-input" data-target="#waktu_mulai">
			                        <div class="input-group-append" data-target="#waktu_mulai" data-toggle="datetimepicker">
			                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
			                        </div>
			                    </div>
			                </div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
			                  <label>Waktu Selesai</label>
			                    <div class="input-group date" id="waktu_selesai" data-target-input="nearest">
			                        <input type="date" name="jam_akhir" class="form-control datetimepicker-input" data-target="#waktu_selesai">
			                        <div class="input-group-append" data-target="#waktu_selesai" data-toggle="datetimepicker">
			                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
			                        </div>
			                    </div>
			                </div>
						</div>
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
@section('js')
<script>
	//Date and time picker
    // $('#waktu_mulai').datetimepicker({ icons: { time: 'far fa-clock' } });
    // $('#waktu_selesai').datetimepicker({ icons: { time: 'far fa-clock' } });
</script>
@endsection