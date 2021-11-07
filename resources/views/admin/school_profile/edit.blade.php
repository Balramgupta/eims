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
	                    <h3 class="card-title pt-2">Edit School Profile</h3>
	                </div>
	                <div class="col-md-6">
	                  <a href="{{route('admin.school_profile')}}" class="btn btn-primary float-right"><i class="fas fa-list"></i> School Profile</a>
	                </div>
	            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.school_profile.update', $school_profile->id)}}" method="post" enctype="multipart/form-data">
          	@csrf
            @method('PUT')
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="school_name">School Name <code>*</code></label>
                    <input type="text" id="school_name" name="school_name" class="form-control" value="{{$school_profile->school_name}}">
                    @error('school_name')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="motto">School Motto <code>*</code></label>
                    <input type="text" id="motto" name="motto" class="form-control" placeholder="Enter School Motto" value="{{$school_profile->motto}}">
                    @error('motto')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="address">School Address <code>*</code></label>
                    <input type="text" id="address" name="address" class="form-control" placeholder="Enter School Address" value="{{$school_profile->address}}">
                    @error('address')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="number">School Number <code>*</code></label>
                    <input type="text" id="number" name="number" class="form-control" placeholder="Enter School Number" value="{{$school_profile->number}}">
                    @error('number')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="pan_no">PAN Number <code>*</code></label>
                    <input type="text" id="pan_no" name="pan_no" class="form-control" value="{{$school_profile->pan_no}}">
                    @error('pan_no')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="form-group">
                    <label for="Image">Principal Sign <code>*</code></label>
                    <input type="file" id="Image" name="principle_sign" class="form-control">
                    @error('principle_sign')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="form-group col-md-1">
                  <img id="showImage" src="{{(!empty($school_profile->principle_sign))?url('admin/assets/uploads/school_profile/'.$school_profile->principle_sign):url('admin/assets/upload/no-img.png')}}" width="100px;" style="border: 1px solid #333; border-radius: 4px;">
                </div>
                <div class="col-sm-5">
                  <div class="form-group">
                    <label for="Image">Accountant Sign <code>*</code></label>
                    <input type="file" id="Image" name="accountant_sign" class="form-control">
                    @error('accountant_sign')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="form-group col-md-1">
                  <img id="showImage" src="{{(!empty($school_profile->accountant_sign))?url('admin/assets/uploads/school_profile/'.$school_profile->accountant_sign):url('admin/assets/upload/no-img.png')}}" width="100px;" style="border: 1px solid #333; border-radius: 4px;">
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="Image">School Logo <code>*</code></label>
                    <input type="file" id="Image" name="logo" class="form-control" value="{{old('logo')}}">
                    @error('logo')
                    <code>{{$message}}</code>
                    @enderror
                  </div>
                </div>
                <div class="form-group col-md-1">
                  <img id="showImage" src="{{(!empty($school_profile->logo))?url('admin/assets/uploads/school_profile/'.$school_profile->logo):url('admin/assets/upload/no-img.png')}}" width="100px;" style="border: 1px solid #333; border-radius: 4px;">
                </div>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><i class="fas fa-share-square"></i> Update</button>
            </div>
          </form>
        </div>
	</div>
</div>


@endsection