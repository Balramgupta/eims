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
	                    <h3 class="card-title pt-2">Create Assign Subject to Class</h3>
	                </div>
	                <div class="col-md-6 text-right">
	                  <a href="{{route('admin.subject.assign_subject_class')}}" class="btn btn-primary float-right"><i class="fas fa-list"></i> Assign Subject to Class List</a>
	                </div>
	            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.subject.assign_subject_class.store')}}" method="post" enctype="multipart/form-data">
          	@csrf
            <div class="add_item">
            <div class="card-body">
              <div class="row">
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
                    <label for="subject_id">Class Subject <code>*</code></label>
                    <select name="subject_id" class="form-control" id="subject_id">
                      <option value="">Select Subject</option>
                      @foreach($subjects as $subject)
                      <option value="{{$subject->id}}">{{$subject->name}}</option>
                      @endforeach
                    </select>
                    @error('subject_id')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="sorting_order">Sorting Order <code>*</code></label>
                    <input type="text" name="sorting_order" id="sorting_order" class="form-control">
                    @error('sorting_order')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Assign Subject <code>*</code></label>
                    <div class="custom-controls-stacked selectgroup">
                      <label class="custom-control custom-radio mr-5">
                        <input type="radio" class="custom-control-input" name="example-radios" value="compulsory" checked>
                        <span class="custom-control-label">Compulsory</span>
                      </label>
                      <label class="custom-control custom-radio mr-5">
                        <input type="radio" class="custom-control-input" name="example-radios" value="optional">
                        <span class="custom-control-label">Optional</span>
                      </label>
                      <label class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="example-radios" value="offered">
                        <span class="custom-control-label">School Offered</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="d-block">Grading Criteria <code>*</code></label>
                    <div class="custom-controls-stacked selectgroup">
                      <label class="custom-control custom-checkbox mr-5">
                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="theory" checked>
                        <span class="custom-control-label">Theory</span>
                      </label>
                      <label class="custom-control custom-checkbox mr-5">
                        <input type="checkbox" class="custom-control-input" name="example-checkbox2" value="paracticle">
                        <span class="custom-control-label">Paracticle</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="d-block">Choose <code>*</code></label>
                    <div class="custom-controls-stacked selectgroup">
                      <label class="custom-control custom-checkbox mr-5">
                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="internal" checked>
                        <span class="custom-control-label">Internal</span>
                      </label>
                      <label class="custom-control custom-checkbox mr-5">
                        <input type="checkbox" class="custom-control-input" name="example-checkbox2" value="project_work">
                        <span class="custom-control-label">Project Work</span>
                      </label>
                    </div>
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

@endsection
