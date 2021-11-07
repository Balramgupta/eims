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
	                    <h3 class="card-title pt-2">Edit Carry Term</h3>
	                </div>
	                <div class="col-md-6 text-right">
	                  <a href="{{route('admin.examination.carry_term')}}" class="btn btn-primary float-right"><i class="fas fa-list"></i> Carry Term List</a>
	                </div>
	            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.examination.carry_term.update', $carryTerm->id)}}" method="post">
          	@csrf
            @method('put')
            <div class="card-body">
              <div class="row">
              	<div class="col-sm-4">
                  <div class="form-group">
                    <label for="term">Term <code>*</code></label>
                    <select name="term_id" class="form-control" id="term">
              				<option value="">Select Term</option>
              				@foreach($terms as $term)
              				<option value="{{$term->id}}">{{$term->name}}</option>
              				@endforeach
              			</select>
                    @error('term')
                	<code>{{$message}}</code>
                	@enderror
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="carry_to">Carry To <code>*</code></label>
                    <input type="text" id="carry_to" name="carry_to" class="form-control" value="{{$carryTerm->carry_to}}">
                    @error('carry_to')
                	<code>{{$message}}</code>
                	@enderror
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="carry_percent">Carry Percentage <code>*</code></label>
                    <input type="text" id="carry_percent" name="carry_percent" class="form-control" value="{{$carryTerm->carry_percent}}">
                    @error('carry_percent')
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