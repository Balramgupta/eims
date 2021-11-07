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
	                    <h3 class="card-title pt-2">Edit Student</h3>
	                </div>
	                <div class="col-md-6 text-right">
	                  <a href="{{route('admin.student.add_student')}}" class="btn btn-primary float-right"><i class="fas fa-list"></i> Student List</a>
	                </div>
	            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.student.add_student.update',$student->id)}}" method="post" enctype="multipart/form-data">
          	@csrf
            @method('PUT')
            <div class="add_item">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="roll_no">Roll No.</label>
                    <input type="text" id="roll_no" name="roll_no" class="form-control" placeholder="Enter Class Code" value="{{$student->roll_no}}">
                    @error('roll_no')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="student_name">Student Name <code>*</code></label>
                    <input type="text" id="student_name" name="student_name" class="form-control" placeholder="Enter Class Code" value="{{$student->student_name}}">
                    @error('student_name')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="gender">Select Gender <code>*</code></label>
                    <select name="gender" class="form-control" id="gender">
                      <option value="">Select Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                    @error('gender')
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
                    <label for="emergency_number">Emergency Contact Number <code>*</code></label>
                    <input type="text" id="emergency_number" name="emergency_number" class="form-control" placeholder="Enter Emergency Contact Number" value="{{$student->emergency_number}}">
                    @error('emergency_number')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="address">Address </label>
                    <input type="text" id="address" name="address" class="form-control" placeholder="Enter Address" value="{{$student->address}}">
                    @error('address')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="nationality">Nationality </label>
                    <select name="nationality" class="form-control" id="gender">
                      <option value="">Select Nationality</option>
                      <option value="nepali">Nepali</option>
                      <option value="indian">Indain</option>
                    </select>
                    @error('nationality')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="father_name">Father Name </label>
                    <input type="text" id="father_name" name="father_name" class="form-control" placeholder="Enter Father Name" value="{{$student->father_name}}">
                    @error('father_name')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="father_number">Father Number </label>
                    <input type="text" id="father_number" name="father_number" class="form-control" placeholder="Enter Father Number" value="{{$student->father_number}}">
                    @error('father_number')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="father_email">Father Email </label>
                    <input type="text" id="father_email" name="father_email" class="form-control" placeholder="Enter Father Email" value="{{$student->father_email}}">
                    @error('father_email')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="father_occupation">Father Occupation </label>
                    <input type="text" id="father_occupation" name="father_occupation" class="form-control" placeholder="Enter Father Occupation" value="{{$student->father_occupation}}">
                    @error('father_occupation')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="father_education">Father Education </label>
                    <input type="text" id="father_education" name="father_education" class="form-control" placeholder="Enter Father Education" value="{{$student->father_education}}">
                    @error('father_education')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="mother_name">Mother Name </label>
                    <input type="text" id="mother_name" name="mother_name" class="form-control" placeholder="Enter Mother Name" value="{{$student->mother_name}}">
                    @error('mother_name')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="mother_number">Mother Number </label>
                    <input type="text" id="mother_number" name="mother_number" class="form-control" placeholder="Enter Mother Number" value="{{$student->mother_number}}">
                    @error('mother_number')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="mother_email">Mother Email </label>
                    <input type="text" id="mother_email" name="mother_email" class="form-control" placeholder="Enter Mother Email" value="{{$student->mother_email}}">
                    @error('mother_email')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="mother_occupation">Mother Occupation </label>
                    <input type="text" id="mother_occupation" name="mother_occupation" class="form-control" placeholder="Enter Mother Occupation" value="{{$student->mother_occupation}}">
                    @error('mother_occupation')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="mother_education">Mother Education </label>
                    <input type="text" id="mother_education" name="mother_education" class="form-control" placeholder="Enter Mother Education" value="{{$student->mother_education}}">
                    @error('mother_education')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="admission_date">Admission Date <code>*</code></label>
                    <input type="date" id="admission_date" name="admission_date" class="form-control" value="{{$student->admission_date}}">
                    @error('admission_date')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="last_school">Last School Name</label>
                    <input type="text" id="last_school" placeholder="Enter Last School Name" name="last_school" class="form-control" value="{{$student->last_school}}">
                    @error('last_school')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="previous_class_percentage">Previous Class Percentage</label>
                    <input type="text" id="previous_class_percentage" placeholder="Enter Previous Class Percentage" name="previous_class_percentage" class="form-control" value="{{$student->previous_class_percentage}}">
                    @error('previous_class_percentage')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="guardian_name">Guardian Name</label>
                    <input type="text" id="guardian_name" placeholder="Enter Guardian Name" name="guardian_name" class="form-control" value="{{$student->guardian_name}}">
                    @error('guardian_name')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="guardian_number">Guardian Number</label>
                    <input type="text" id="guardian_number" placeholder="Enter Guardian Number" name="guardian_number" class="form-control" value="{{$student->guardian_number}}">
                    @error('guardian_number')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="guardian_email">Guardian Email</label>
                    <input type="text" id="guardian_email" placeholder="Enter Guardian Email" name="guardian_email" class="form-control" value="{{$student->guardian_email}}">
                    @error('guardian_email')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="guardian_education">Guardian Education</label>
                    <input type="text" id="guardian_education" placeholder="Enter Guardian Education" name="guardian_education" class="form-control" value="{{$student->guardian_education}}">
                    @error('guardian_education')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="guardian_relation">Guardian Relation</label>
                    <input type="text" id="guardian_relation" placeholder="Enter Guardian Relation" name="guardian_relation" class="form-control" value="{{$student->guardian_relation}}">
                    @error('guardian_relation')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="passport_number">Passport Number</label>
                    <input type="text" id="passport_number" placeholder="Enter Passport Number" name="passport_number" class="form-control" value="{{$student->passport_number}}">
                    @error('passport_number')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="place_issue">Place of Issue</label>
                    <input type="text" id="place_issue" placeholder="Enter Place of Issue" name="place_issue" class="form-control" value="{{$student->place_issue}}">
                    @error('place_issue')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="issue_date">Issue Date</label>
                    <input type="date" id="issue_date" placeholder="Enter Issue Date" name="issue_date" class="form-control" value="{{$student->issue_date}}">
                    @error('issue_date')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="vissa_category">Vissa Category</label>
                    <select name="vissa_category" class="form-control" id="vissa_category">
                      <option value="">Select Vissa Category</option>
                      <option value="working">Working</option>
                      <option value="study">Study</option>
                    </select>
                    @error('vissa_category')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="birth_certificate">Upload Birth Certificate</label>
                    <input type="file" name="birth_certificate" class="form-control" id="birth_certificate">
                    @error('birth_certificate')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="photo">Upload Photo</label>
                    <input type="file" name="photo" class="form-control" id="photo">
                    @error('photo')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="disability">Disability</label>
                    <input type="text" name="disability" class="form-control" id="disability" value="{{$student->disability}}">
                    @error('disability')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="special_instruction">Special Instruction</label>
                    <input type="text" name="special_instruction" class="form-control" id="special_instruction" value="{{$student->special_instruction}}">
                    @error('special_instruction')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="distinct_behaviour">Distinct Behaviour</label>
                    <input type="text" name="distinct_behaviour" class="form-control" id="distinct_behaviour" value="{{$student->distinct_behaviour}}">
                    @error('distinct_behaviour')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="disease">Disease</label>
                    <input type="text" name="disease" class="form-control" id="disease" value="{{$student->disease}}">
                    @error('disease')
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
