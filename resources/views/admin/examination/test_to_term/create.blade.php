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
	                    <h3 class="card-title pt-2">Create Test to Term</h3>
	                </div>
	                <div class="col-md-6 text-right">
	                  <a href="{{route('admin.examination.test_to_term')}}" class="btn btn-primary float-right"><i class="fas fa-list"></i> Test to Term List</a>
	                </div>
	            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.examination.test_to_term.store')}}" method="post">
          	@csrf
            <div class="card-body">
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="test">Test <code>*</code></label>
                    <select name="test_id" class="form-control" id="test">
                      <option value="">Select Test</option>
                      @foreach($tests as $test)
                      <option value="{{$test->id}}">{{$test->name}}</option>
                      @endforeach
                    </select>
                    @error('test')
                  <code>{{$message}}</code>
                  @enderror
                  </div>
                </div>
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
                    <label for="carry_percent">Carry Percentage <code>*</code></label>
                    <input type="text" id="carry_percent" name="carry_percent" class="form-control" placeholder="Enter Carry Percentage" value="{{old('carry_percent')}}">
                    @error('carry_percent')
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