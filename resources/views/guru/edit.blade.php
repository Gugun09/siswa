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
              <form method="POST" action="{{ route('guru.update', $user->id) }}">
              	@csrf
                <div class="card-body">
                	<div class="form-group">
                		<label>NIP/NUPTK</label>
                		<input type="text" name="nip" class="form-control" value="{{ $user->nip }}" placeholder="NIP/NUPTK">
                	</div>
                	<div class="form-group">
                		<label>Nama Guru</label>
                		<input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Nama Guru">
                	</div>
                	<div class="form-group">
                		<label>Email</label>
                		<input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email Guru">
                	</div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection