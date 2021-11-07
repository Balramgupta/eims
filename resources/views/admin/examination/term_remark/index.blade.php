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
	<div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <h3 class="card-title pt-2">Term Remarks List</h3>
                  </div>
                  <div class="col-md-6 text-right">
                    <a href="{{route('admin.examination.term_remark.create')}}" class="btn btn-primary float-right"><i class="fas fa-share-square"></i> Create Term Remark</a>
                  </div>
                </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SN</th>
                <th>Term Name</th>
                <th>Level</th>
                <th>Faculty</th>
                <th>Class</th>
                <th>Section</th>
                <th>Student</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach($students as $key => $student)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$student->student_name}}</td>
                    <th>{{$student['student_class']['class_name']}}</th>
                    <th>{{$student->gender}}</th>
                    <th>{{$student->emergency_number}}</th>
                    <td>
                    	<a href="{{route('admin.student.add_student.edit',$student->id)}}" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
                    	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal">
                        <i class="fas fa-trash"></i> Delete
                      </button>
                    	    <!-- Delete Modal Section Start -->
                          <div class="modal fade" id="delete-modal">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Delete</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                    <div class="modal-body">
                                      <h4>Are you sure want to Delete</h4>
                                      <p>Once deleted, you will not be able to recover this Data !!!</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                      <a href="#" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                          </div>
                          <!-- Delete Modal Section End -->
                    </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>

        <!-- Detail Modal Section Start -->
        <div class="modal fade" id="detail-modal{{$student->id}}">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Student Detail</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <div class="modal-body">
                    <div class="row">
                      @foreach($students as $student)
                      <div class="col-md-3 list-group-item">
                        <b>Roll NUmber</b>
                        <p>{{$student->roll_no}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Student Name</b>
                        <p>{{$student->student_name}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Gender</b>
                        <p>{{$student->gender}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Level</b>
                        <p>{{$student['level']['name']}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Faculty</b>
                        <p>{{$student['faculty']['name']}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Class</b>
                        <p>{{$student['student_class']['class_name']}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Section</b>
                        <p>{{$student['student_class']['section_name']}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Emergency Number</b>
                        <p>{{$student->emergency_number}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Address</b>
                        <p>{{$student->address}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Nationality</b>
                        <p>{{$student->nationality}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Father Name</b>
                        <p>{{$student->father_name}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Father Number</b>
                        <p>{{$student->father_number}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Father Email</b>
                        <p>{{$student->father_email}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Father Occupation</b>
                        <p>{{$student->father_occupation}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Father Education</b>
                        <p>{{$student->father_education}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Mother Name</b>
                        <p>{{$student->mother_name}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Mother Number</b>
                        <p>{{$student->mother_number}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Mother Email</b>
                        <p>{{$student->mother_email}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Mother Occupation</b>
                        <p>{{$student->mother_occupation}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Mother Education</b>
                        <p>{{$student->mother_education}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Admission Date</b>
                        <p>{{$student->admission_date}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Last School</b>
                        <p>{{$student->last_school}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Previous Class Percentage</b>
                        <p>{{$student->previous_class_percentage}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Guardian Name</b>
                        <p>{{$student->guardian_name}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Guardian Number</b>
                        <p>{{$student->guardian_number}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Guardian Email</b>
                        <p>{{$student->guardian_email}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Guardian Occupation</b>
                        <p>{{$student->guardian_occupation}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Guardian Education</b>
                        <p>{{$student->guardian_education}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Guardian Relation</b>
                        <p>{{$student->guardian_relation}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Passport Number</b>
                        <p>{{$student->passport_number}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Place Issue</b>
                        <p>{{$student->place_issue}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Issue Date</b>
                        <p>{{$student->issue_date}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Vissa Category</b>
                        <p>{{$student->vissa_category}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Disability</b>
                        <p>{{$student->disability}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Special Instruction</b>
                        <p>{{$student->special_instruction}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Distinct Behaviour</b>
                        <p>{{$student->distinct_behaviour}}</p>
                      </div>
                      <div class="col-md-3 list-group-item">
                        <b>Disease</b>
                        <p>{{$student->disease}}</p>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Detail Modal Section End -->

  </div>
</div>
@endsection

