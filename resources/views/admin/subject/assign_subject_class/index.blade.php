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
                    <h3 class="card-title pt-2">Assign Subject to Class List</h3>
                  </div>
                  <div class="col-md-6 text-right">
                    <a href="{{route('admin.subject.assign_subject_class.create')}}" class="btn btn-primary float-right"><i class="fas fa-share-square"></i> Create Assign Subject to Class</a>
                  </div>
                </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>S.N.</th>
                <th>Level</th>
                <th>Faculty</th>
                <th>Class</th>
                <th>Subject</th>
                <th>Assign Subject</th>
                <th>Grading Criteria</th>
                <th>Sorting Order</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              	@foreach($assignSubjectClass as $key => $assignSubjectClass)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$assignSubjectClass['student_class']['class_name']}}</td>
                    <td>
                    	<a href="{{route('admin.class.assignSubjectClass.edit',$assignSubjectClass->id)}}" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
                    	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal{{$assignSubjectClass->id}}">
                        <i class="fas fa-trash"></i> Delete
                        </button>
                    	<!-- Delete Modal Section Start -->
                          <div class="modal fade" id="delete-modal{{$assignSubjectClass->id}}">
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
                                      <a href="{{route('admin.class.assignSubjectClass.destroy',$assignSubjectClass->id)}}" class="btn btn-danger">Delete</a>
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
  </div>
</div>
@endsection

