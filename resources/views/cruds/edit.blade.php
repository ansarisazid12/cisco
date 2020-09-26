
@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <h2>Add Crud </h2>
            <form method="POST" action="{{ route('crud.store',$crud->sapid) }}">           
                    @csrf
                    <input  type="hidden" name="id" value="{{ $crud->sapid }}" > 
                    <div class="row">
						
						<div class="form-group col-md-6">
							<label for="name" class="col-md-12 col-form-label text-md-right">hostname</label>
							<div class="col-md-12">
								<input id="hostname" type="text" class="form-control{{ $errors->has('hostname') ? ' is-invalid' : '' }}" name="hostname" value="{{ $crud->hostname }}" required autofocus>
								@if ($errors->has('hostname'))
									<span class="invalid-feedback">
										<strong>{{ $errors->first('hostname') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="code" class="col-md-12 col-form-label text-md-right">loopback</label>
							<div class="col-md-12">
								<input id="loopback" type="text" class="form-control{{ $errors->has('loopback') ? ' is-invalid' : '' }}" name="loopback" value="{{ $crud->loopback }}" >
								@if ($errors->has('loopback'))
									<span class="invalid-feedback">
										<strong>{{ $errors->first('loopback') }}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="form-group col-md-6">
							<label for="mackaddress" class="col-md-12 col-form-label text-md-right">mackaddress</label>
							<div class="col-md-12">
								<input id="mackaddress" type="text" class="form-control" name="mackaddress" value="{{ $crud->mackaddress }}" required>
								@if ($errors->has('mackaddress'))
									<span class="invalid-feedback">
										<strong>{{ $errors->first('mackaddress') }}</strong>
									</span>
								@endif
							</div>
						</div>
						
						
						
						
						
						
						
						
						
						<div class="form-group col-md-12">
							<div class="col-md-12 ml-auto text-right">
								<button type="submit" class="btn btn-primary">
									Submit
								</button>
							</div>
						</div>
					</div>
            </form>
        </div>
 </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  
    </section>
    <!-- /.content -->
@endsection
