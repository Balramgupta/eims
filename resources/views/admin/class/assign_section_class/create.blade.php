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
	                    <h3 class="card-title pt-2">Assign Section to Class</h3>
	                </div>
	                <div class="col-md-6 text-right">
	                  <a href="{{route('admin.class.assign_section_class')}}" class="btn btn-primary float-right"><i class="fas fa-list"></i> Assign Section to Class List</a>
	                </div>
	            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
        <form role="form" action="{{route('admin.class.assign_section_class.store')}}" method="post">
          	@csrf
            <div class="card-body">
	            <div class="add_item">
	              	<div class="row">
		              	<div class="col-sm-4">
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
		                <div class="col-sm-4">
		                  <div class="form-group">
		                    <label>Faculty Name <code>*</code></label>
		                    <select name="faculty_id" class="form-control" id="faculty_id">
		                      <option value="">Select Faculty</option>
		                    </select>
		                  </div>
		                </div>
		                <div class="col-sm-4">
		                  <div class="form-group">
		                    <label>Select Class <code>*</code></label>
		                    <select name="class_id" class="form-control" id="class_id">
		                      <option value="">Select Class</option>
		                    </select>
		                  </div>
		                </div>
	              	</div>
	              	<div class="row">
	        			<div class="form-group col-md-6">
	            			<label for="section_name">Section Name <code>*</code></label>
	            			<input type="text" id="section_name" name="section_name[]" class="form-control" placeholder="Enter Section Name" value="{{old('section_name')}}">
	                        @error('section_name')
		                	<code>{{$message}}</code>
		                	@enderror
	            		</div>
	            		<div class="form-group col-md-2" style="margin-top: 30px;">
	            			<span class="btn btn-primary addeventmore"><i class="fa fa-plus-circle"></i></span>
	            		</div>
	        		</div>
	            </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><i class="fas fa-share-square"></i> Create</button>
            </div>
        </form>

        <div style="visibility: hidden;">
			<div class="whole_extra_item_add" id="whole_extra_item_add">
				<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
					<div class="form-row">
	            		<div class="form-group col-md-6">
	            			<label for="FullMark">Section Name <code>*</code></label>
	            			<input type="text" id="FullMark" name="section_name[]" class="form-control" placeholder="Enter Full Mark" value="{{old('section_name')}}">
	                        @error('section_name')
		                	<code>{{$message}}</code>
		                	@enderror
	            		</div>
						<div class="form-group col-md-2" style="margin-top: 30px;">
							<span class="btn btn-primary addeventmore"><i class="fa fa-plus-circle"></i></span>
							<span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
						</div>
					</div>
				</div>
			</div>
		</div>


          
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

<script type="text/javascript">
  $(function(){
    $(document).on('change', '#faculty_id', function(){
      var faculty_id = $('#faculty_id').val();
      $.ajax({
        url:"{{route('get-class')}}",
        type:"GET",
        data:{faculty_id:faculty_id},
        success:function(data){
          var html = '<option value="">Select Class</option>';
          $.each(data, function(key, v){
            html += '<option value="'+v.id+'">'+v.class_name+'</option>';
          });
          $('#class_id').html(html);
        }
      });
    });
  });
</script>


<!-- Extra Add Item -->
<script type="text/javascript">
	$(document).ready(function(){
		var counter = 0;
		$(document).on("click",".addeventmore", function(){
			var whole_extra_item_add = $("#whole_extra_item_add").html();
			$(this).closest(".add_item").append(whole_extra_item_add);
			counter+; 
		});
		$(document).on("click",".removeeventmore", function(event){
			$(this).closest(".delete_whole_extra_item_add").remove();
			counter -=1;
		});
	});
</script>


@endsection
