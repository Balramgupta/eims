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
	                    <h3 class="card-title pt-2">Assign Roll</h3>
	                </div>
	            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.student.assign_roll.store')}}" method="post">
          	@csrf
            <div class="card-body">
              	<div class="row">
	              	<div class="col-md-3">
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
	                <div class="col-md-3">
	                  <div class="form-group">
	                    <label>Faculty Name <code>*</code></label>
	                    <select name="faculty_id" class="form-control" id="faculty_id">
	                      <option value="">Select Faculty</option>
	                    </select>
	                  </div>
	                </div>
	                <div class="col-md-3">
	                  <div class="form-group">
	                    <label>Select Class <code>*</code></label>
	                    <select name="class_id" class="form-control" id="class_id">
	                      <option value="">Select Class</option>
	                    </select>
	                  </div>
	                </div>
	                <div class="col-md-2">
	                  <div class="form-group">
	                    <label>Select Section <code>*</code></label>
	                    <select name="section_id" class="form-control" id="section_id">
	                      <option value="">Select Section</option>
	                    </select>
	                  </div>
	                </div>
	                <div class="col-md-1" style="margin-top: 30px;">
		            	<a id="search" title="Search" class="btn btn-primary" name="search" style="color: #fff;"><i class="fas fa-search"></i> Search</a>
		            </div>
              	</div>
              	<div class="row d-none" id="roll-generate">
          			<div class="col-md-12">
          				<table class="table table-bordered table-striped dt-responsive" style="width: 100%;">
          					<thead>
          						<tr>
          							<th>ID No.</th>
              						<th>Student Name</th>
              						<th>Father's Name</th>
              						<th>Gender</th>
              						<th>Roll No.</th>
          						</tr>
          					</thead>
          					<tbody id="roll-generate-tr">
          					</tbody>
          				</table>
          			</div>
          			<button type="submit" class="btn btn-success">Roll Generate</button>
          		</div>
            </div>
            <!-- /.card-body -->
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
          var html = '<option value="">Select Faculty</option>';
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

<script type="text/javascript">
  $(function(){
    $(document).on('change', '#class_id', function(){
      var class_id = $('#class_id').val();
      $.ajax({
        url:"{{route('get-section')}}",
        type:"GET",
        data:{class_id:class_id},
        success:function(data){
          var html = '<option value="">Select Section</option>';
          $.each(data, function(key, v){
            html += '<option value="'+v.id+'">'+v.section_name+'</option>';
          });
          $('#section_id').html(html);
        }
      });
    });
  });
</script>



<script type="text/javascript">
	$(document).on('click', '#search', function(){
		var class_id = $('#level_id').val();
		var class_id = $('#faculty_id').val();
		var class_id = $('#class_id').val();
		var section_id = $('#section_id').val();
		$.ajax({
			url: "{{route('admin.student.assign_roll.get_student')}}",
			type: "GET",
			data: {'level_id': level_id, 'class_id': faculty_id, 'faculty_id': class_id, 'section_id': section_id},
			success: function(data){
				$('#roll-generate').removeClass('d-none');
				var html = '';
				$.each(data, function(key, v){
					html +=
					'<tr>'+
					'<td>'+v.student.name+'</td>'+
					'<td>'+v.student.father_name+'</td>'+
					'<td>'+v.student.gender+'</td>'+
					'<td><input type="text" class="form-control" name="roll[]" value="'+v.roll+'"></td>'+
					'</tr>';
				});
				html = $('#roll-generate-tr').html(html);
			}
		});
	});
</script>


@endsection