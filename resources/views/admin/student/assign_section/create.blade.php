@extends('admin.layout.layout')
@extends('admin.layout.sidebar')
@extends('admin.layout.header')

@section('content')

@if(session()->has('msg'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <i class="icon fas fa-check"></i> {{session('msg')}}
</div>
@endif
@if(session()->has('delMsg'))
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <i class="icon fas fa-check"></i> {{session('delMsg')}}
</div>
@endif

<div class="row">
	<div class="col-md-12">
		<div class="card">
          <div class="card-header">
            <div class="col-md-12">
            	<div class="row">
	                <div class="col-md-6">
	                    <h3 class="card-title pt-2">Create Assign Section</h3>
	                </div>
	                <div class="col-md-6 text-right">
	                  <a href="{{route('admin.student.assign_section')}}" class="btn btn-primary float-right"><i class="fas fa-list"></i> Assign Section List</a>
	                </div>
	            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.student.assign_section.store')}}" method="post">
          	@csrf
            <div class="add_item">
            <div class="card-body">
              <div class="row">
              	<div class="col-sm-6">
                  <div class="form-group">
                    <label for="studentClass">Class <code>*</code></label>
                    <select name="class_id" class="form-control" id="studentClass">
              				<option value="">Select Class</option>
              				@foreach($studentClass as $studentClass)
              				<option value="{{$studentClass->id}}">{{$studentClass->name}}</option>
              				@endforeach
              			</select>
                    @error('studentClass')
                  	<code>{{$message}}</code>
                  	@enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="section">Section <code>*</code></label>
                    <select name="section_id" class="form-control" id="section">
                      <option value="">Select Section</option>
                      <option value=""></option>
                    </select>
                    @error('section')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label">Select Students</label>
                    <select multiple="multiple" class="multi-select">
                      <option value="1">Ram</option>
                      <option value="2">Hari</option>
                      <option value="3">Sita</option>
                      <option value="4">Rita</option>
                      <option value="5">Gita</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><i class="fas fa-share-square"></i> Create</button>
            </div>
          </form>


          
        </div>
	</div>
</div>


@endsection
