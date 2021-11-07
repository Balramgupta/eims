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
                    <h3 class="card-title pt-2">Assign Deportment to Class List</h3>
                  </div>
                  <div class="col-md-6 text-right">
                    <a href="{{route('admin.examination.assign_deportment_class.create')}}" class="btn btn-primary float-right"><i class="fas fa-share-square"></i> Create Assign Deportment to Class Level</a>
                  </div>
                </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Level</th>
                <th>Faculty</th>
                <th>Class</th>
                <th>Term</th>
                <th>Deportment</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach($assignDeportmentClass as $key => $assignDeportmentClass)
                  <tr>
                    <td>{{$assignDeportmentClass['level']['name']}}</td>
                    <td>{{$assignDeportmentClass['faculty']['name']}}</td>
                    <td>{{$assignDeportmentClass['studentClass']['class_name']}}</td>
                    <td>{{$assignDeportmentClass['term']['name']}}</td>
                    <td>{{$assignDeportmentClass['deportment']['title']}}</td>
                    <td>
                    	<a href="{{route('admin.examination.assign_deportment_class.edit',$assignDeportmentClass->id)}}" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
                      <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i> Drop</a>
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

        

  </div>
</div>
@endsection

