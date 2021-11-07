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
                    <h3 class="card-title pt-2">Assign Section to Class Detail</h3>
                  </div>
                  <div class="col-md-6 text-right">
                    <a href="{{route('admin.class.assign_section_class')}}" class="btn btn-primary float-right"><i class="fas fa-share-square"></i> Assign Section to Class List</a>
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
								<th>Section Name</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detailData as $key=>$value)
			                  <tr>
			                  	<td>{{$key+1}}</td>
			                    <td>{{$value->section_name}}</td>
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