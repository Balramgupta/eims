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
	                    <h3 class="card-title pt-2">Create Term Remark</h3>
	                </div>
	                <div class="col-md-6 text-right">
	                  <a href="{{route('admin.examination.term_remark')}}" class="btn btn-primary float-right"><i class="fas fa-list"></i> Term Remark List</a>
	                </div>
	            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.examination.term_remark.store')}}" method="post" enctype="multipart/form-data">
          	@csrf
            <div class="add_item">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="term_id">Select Term <code>*</code></label>
                    <select name="term_id" class="form-control" id="term_id">
                      <option value="">Select Select Term</option>
                      @foreach($terms as $term)
                      <option value="{{$term->id}}">{{$term->name}}</option>
                      @endforeach
                    </select>
                    @error('term')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
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
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Faculty Name <code>*</code></label>
                    <select name="faculty_id" class="form-control" id="faculty_id">
                      <option value="">Select Faculty</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Select Class <code>*</code></label>
                    <select name="class_id" class="form-control" id="class_id">
                      <option value="">Select Class</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Select Section <code>*</code></label>
                    <select name="section_id" class="form-control" id="section_id">
                      <option value="">Select Section</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Select Student <code>*</code></label>
                    <select multiple="multiple" class="multi-select" name="student_id" id="student_id">
                      <option value="1">Ram</option>
                      <option value="2">Shyam</option>
                      <option value="3">Hari</option>
                      <option value="4">Sita</option>
                      <option value="5">Rita</option>
                    </select>
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
  $(function(){
    $(document).on('change', '#section_id', function(){
      var section_id = $('#section_id').val();
      $.ajax({
        url:"{{route('get-section')}}",
        type:"GET",
        data:{section_id:section_id},
        success:function(data){
          var html = '<option value="">Select Student</option>';
          $.each(data, function(key, v){
            html += '<option value="'+v.id+'">'+v.student_name+'</option>';
          });
          $('#student_id').html(html);
        }
      });
    });
  });
</script>

@endsection
