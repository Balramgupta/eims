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
	                    <h3 class="card-title pt-2">Create Remark List</h3>
	                </div>
	                <div class="col-md-6">
	                  <a href="{{route('admin.examination.remark_list')}}" class="btn btn-primary float-right"><i class="fas fa-list"></i> Remark List</a>
	                </div>
	            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.examination.remark_list.store')}}" method="post">
          	@csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="remark_code">Remarks Code Number <code>*</code></label>
                    <input type="text" id="remark_code" name="remark_code" class="form-control" placeholder="Enter Remarks Code Number" value="{{old('remark_code')}}">
                    @error('remark_code')
                	<code>{{$message}}</code>
                	@enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="remark_description">Remarks Description</label>
                    <textarea id="remark_description" name="remark_description" class="form-control" placeholder="Enter Remarks Description" value="{{old('remark_description')}}"> </textarea>
                    @error('remark_description')
                  <code>{{$message}}</code>
                  @enderror
                  </div>
                </div>
                <div class="col-md-9">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="is_for_annual_exam" value="Yes">
                    <span class="custom-control-label">Is for Annual Exam</span>
                  </label>
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