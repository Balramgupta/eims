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
                    <h3 class="card-title pt-2">Edit Grade</h3>
                </div>
                <div class="col-md-6 text-right">
                  <a href="{{route('admin.examination.grade_detail')}}" class="btn btn-primary float-right"><i class="fas fa-list"></i> Grade List</a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.examination.grade_detail.update',$gradeDetail->id)}}" method="post">
          	@csrf
          	@method('put')
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="percentage_from">Percentage From (%) <code>*</code></label>
                    <input type="text" id="percentage_from" name="percentage_from" class="form-control" value="{{$gradeDetail->percentage_from}}">
                    @error('percentage_from')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="percentage_to">Percentage To (%) <code>*</code></label>
                    <input type="text" id="percentage_to" name="percentage_to" class="form-control" value="{{$gradeDetail->percentage_to}}">
                    @error('percentage_to')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="grade_name">Grade Name <code>*</code></label>
                    <input type="text" id="grade_name" name="grade_name" class="form-control" value="{{$gradeDetail->grade_name}}">
                    @error('grade_name')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="grade_point">Grade Point <code>*</code></label>
                    <input type="text" id="grade_point" name="grade_point" class="form-control" value="{{$gradeDetail->grade_point}}">
                    @error('grade_point')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Description</label>
                  <textarea class="form-control" name="description" rows="5">
                    {{$gradeDetail->description}}
                  </textarea>
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