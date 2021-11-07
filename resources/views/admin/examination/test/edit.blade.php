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
                    <h3 class="card-title pt-2">Edit Test</h3>
                </div>
                <div class="col-md-6 text-right">
                  <a href="{{route('admin.examination.test')}}" class="btn btn-primary float-right"><i class="fas fa-list"></i> Test List</a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.examination.test.update',$test->id)}}" method="post">
          	@csrf
          	@method('put')
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-level">
                    <label for="Name">Test Name <code>*</code></label>
                    <input type="text" id="Name" name="name" class="form-control"  value="{{$test->name}}">
                    @error('name')
                	<code>{{$message}}</code>
                	@enderror
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><i class="fas fa-share-square"></i> Update</button>
            </div>
          </form>
        </div>
	</div>
</div>

@endsection