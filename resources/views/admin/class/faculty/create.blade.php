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
	                    <h3 class="card-title pt-2">Create Faculty</h3>
	                </div>
	                <div class="col-md-6 text-right">
	                  <a href="{{route('admin.class.faculty')}}" class="btn btn-primary float-right"><i class="fas fa-list"></i> Faculty List</a>
	                </div>
	            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.class.faculty.store')}}" method="post">
          	@csrf
            <div class="card-body">
              <div class="row">
              	<div class="col-sm-6">
                  <div class="form-group">
                    <label for="level">Class Level <code>*</code></label>
                    <select name="level_id" class="form-control" id="level">
              				<option value="">Select Class Level</option>
              				@foreach($levels as $level)
              				<option value="{{$level->id}}">{{$level->name}}</option>
              				@endforeach
              			</select>
                    @error('level')
                	<code>{{$message}}</code>
                	@enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="name">Faculty Name <code>*</code></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Faculty Name" value="{{old('name')}}">
                    @error('name')
                	<code>{{$message}}</code>
                	@enderror
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><i class="fas fa-share-square"></i> Create</button>
            </div>
          </form>
        </div>
	</div>
</div>

@endsection