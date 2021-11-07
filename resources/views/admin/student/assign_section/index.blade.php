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
	<div class="col-md-12 col-lg-12">
		<div class="card">
			<div class="card-header">
            <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6">
                    <h3 class="card-title pt-2">Assign Section List</h3>
                  </div>
                  <div class="col-md-6 text-right">
                    <a href="{{route('admin.student.assign_section.create')}}" class="btn btn-primary float-right"><i class="fas fa-share-square"></i> Create Assign Section</a>
                  </div>
                </div>
            </div>
          </div>
			<div class="card-body p-0">
				<div class="table-responsive">
					<table class="table table-striped card-table table-vcenter text-nowrap mb-0">
						<thead>
							<tr>
								<th>ID</th>
								<th>Class Name</th>
								<th>Section Name</th>
								<th>Student Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Class Name</td>
								<td>Section Name</td>
								<td>Student Name</td>
								<td>
									<a href="#" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
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
						</tbody>
					</table>
				</div><!-- bd -->
			</div><!-- bd -->
		</div>
	</div>
</div>

@endsection