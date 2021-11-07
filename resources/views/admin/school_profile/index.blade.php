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
                    <h3 class="card-title pt-2">School Profile</h3>
                  </div>
                  <div class="col-md-6 text-right">
                    <a href="{{route('admin.school_profile.create')}}" class="btn btn-primary float-right"><i class="fas fa-share-square"></i> Create School Profile</a>
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
                <th>Logo</th>
                <th>School Name</th>
                <th>Motto</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>PAN Number</th>
                <th>Principle Sign</th>
                <th>Accountant Sign</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              	@foreach($school_profile as $school_profile)
                  <tr>
                    <td>{{$school_profile->id}}</td>
                    <td><img src="{{(!empty($school_profile->logo))?url('admin/assets/uploads/school_profile/'.$school_profile->logo):url('admin/assets/uploads/no-img.png')}}" alt="Student Image" width="80px;"></td>
                    <td>{{$school_profile->school_name}}</td>
                    <td>{{$school_profile->motto}}</td>
                    <td>{{$school_profile->address}}</td>
                    <td>{{$school_profile->number}}</td>
                    <td>{{$school_profile->pan_no}}</td>
                    <td><img src="{{(!empty($school_profile->principle_sign))?url('admin/assets/uploads/school_profile/'.$school_profile->principle_sign):url('admin/assets/uploads/no-img.png')}}" alt="Student Image" width="80px;"></td>
                    <td><img src="{{(!empty($school_profile->accountant_sign))?url('admin/assets/uploads/school_profile/'.$school_profile->accountant_sign):url('admin/assets/uploads/no-img.png')}}" alt="Student Image" width="80px;"></td>
                    <td>
                    	<a href="{{route('admin.school_profile.edit',$school_profile->id)}}" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
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

