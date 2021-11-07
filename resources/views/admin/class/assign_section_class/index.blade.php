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
                    <h3 class="card-title pt-2">Assign Section to Class List</h3>
                  </div>
                  <div class="col-md-6 text-right">
                    <a href="{{route('admin.class.assign_section_class.create')}}" class="btn btn-primary float-right"><i class="fas fa-share-square"></i> Assign Section to Class</a>
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
								<th>level Name</th>
								<th>Faculty Name</th>
								<th>Class Name</th> 
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($assign_section_class as $key=>$assign_section_class)
							<tr>
								<th scope="row">{{$key+1}}</th>
								<td>{{$assign_section_class['level']['name']}}</td>
								<td>{{$assign_section_class['faculty']['name']}}</td>
								<td>{{$assign_section_class['student_class']['class_name']}}</td>
								<td>
									<a href="{{route('admin.class.assign_section_class.detail',$assign_section_class->class_id)}}" class="btn btn-primary"><i class="far fa-eye"></i> View</a>
									<a href="{{route('admin.class.assign_section_class.edit',$assign_section_class->class_id)}}" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div><!-- bd -->
			</div><!-- bd -->
		</div>
	</div>
</div>

@endsection