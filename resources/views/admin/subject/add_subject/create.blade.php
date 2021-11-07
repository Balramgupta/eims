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
	                    <h3 class="card-title pt-2">Create Subject</h3>
	                </div>
	                <div class="col-md-6">
	                  <a href="{{route('admin.subject')}}" class="btn btn-primary float-right"><i class="fas fa-list"></i> Subject List</a>
	                </div>
	            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.subject.store')}}" method="post">
          	@csrf
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="subject_name">Subject Name <code>*</code></label>
                    <input type="text" id="subject_name" name="subject_name" class="form-control" placeholder="Enter Subject Name" value="{{old('subject_name')}}">
                    @error('subject_name')
                  	<code>{{$message}}</code>
                  	@enderror
                    </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="credit_hour">Credit Hour <code>*</code></label>
                    <input type="text" id="credit_hour" name="credit_hour" class="form-control" placeholder="Enter Credit Hour" value="{{old('credit_hour')}}">
                    @error('credit_hour')
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