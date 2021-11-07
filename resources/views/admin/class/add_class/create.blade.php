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
	                    <h3 class="card-title pt-2">Create Class</h3>
	                </div>
	                <div class="col-md-6 text-right">
	                  <a href="{{route('admin.class')}}" class="btn btn-primary float-right"><i class="fas fa-list"></i> Class List</a>
	                </div>
	            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.class.store')}}" method="post">
          	@csrf
            <div class="add_item">
            <div class="card-body">
              <div class="row">
              	<div class="col-sm-6">
                  <div class="form-group">
                    <label for="level_id">Class Level <code>*</code></label>
                    <select name="level_id" class="form-control" id="level_id">
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
                    <label>Faculty Name <code>*</code></label>
                    <select name="faculty_id" class="form-control" id="faculty_id">
                      <option value="">Select Faculty</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="class_code">Class Code <code>*</code></label>
                    <input type="text" id="class_code" name="class_code" class="form-control" placeholder="Enter Class Code" value="{{old('class_code')}}">
                    @error('class_code')
                  <code>{{$message}}</code>
                  @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="class_name">Class Name <code>*</code></label>
                    <input type="text" id="class_name" name="class_name" class="form-control" placeholder="Enter Class Name" value="{{old('class_name')}}">
                    @error('class_name')
                	<code>{{$message}}</code>
                	@enderror
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


<script type="text/javascript">
  $(function(){
    $(document).on('change', '#level_id', function(){
      var level_id = $('#level_id').val();
      $.ajax({
        url:"{{route('get-faculty')}}",
        type:"GET",
        data:{level_id:level_id},
        success:function(data){
          var html = '<option value="">Select Section</option>';
          $.each(data, function(key, v){
            html += '<option value="'+v.id+'">'+v.name+'</option>';
          });
          $('#faculty_id').html(html);
        }
      });
    });
  });
</script>

@endsection
