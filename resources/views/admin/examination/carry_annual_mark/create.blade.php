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
	                    <h3 class="card-title pt-2">Create Carry Annual Mark</h3>
	                </div>
	                <div class="col-md-6 text-right">
	                  <a href="{{route('admin.examination.carry_annual_mark')}}" class="btn btn-primary float-right"><i class="fas fa-list"></i> Carry Annual Mark List</a>
	                </div>
	            </div>
            </div>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{route('admin.examination.carry_annual_mark.store')}}" method="post" enctype="multipart/form-data">
          	@csrf
            <div class="card-body">
            <div class="add_item">
              <div class="row">
                <div class="form-group col-md-5">
                  <label for="term_id">Select Term <code>*</code></label>
                  <select class="form-control" id="term_id" name="term_id[]">
                    <option>Select Term</option>
                    @foreach($terms as $term)
                    <option>{{$term->name}}</option>
                    @endforeach
                  </select>
                    @error('term_id')
                    <code>{{$message}}</code>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                  <label for="carry_percent">Carry Percent <code>*</code></label>
                  <input type="text" id="carry_percent" name="carry_percent[]" class="form-control" placeholder="Enter Carry Percent" value="{{old('carry_percent')}}">
                    @error('carry_percent')
                    <code>{{$message}}</code>
                    @enderror
                </div>
                  <div class="form-group col-md-2" style="margin-top: 30px;">
                    <span class="btn btn-primary addeventmore"><i class="fa fa-plus-circle"></i></span>
                  </div>
              </div>

            </div>
            <!-- /.card-body -->
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><i class="fas fa-share-square"></i> Create</button>
            </div>
          </form>

          <div style="visibility: hidden;">
            <div class="whole_extra_item_add" id="whole_extra_item_add">
              <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label for="subject_id">Select Subject <code>*</code></label>
                    <select class="form-control" id="term_id" name="term_id[]">
                      <option>Select Term</option>
                      @foreach($terms as $term)
                      <option>{{$term->name}}</option>
                      @endforeach
                    </select>
                      @error('subject_id')
                      <code>{{$message}}</code>
                      @enderror
                  </div>
                  <div class="form-group col-md-5">
                    <label for="carry_percent">Carry Percent <code>*</code></label>
                    <input type="text" id="carry_percent" name="carry_percent[]" class="form-control" placeholder="Enter Carry Percent" value="{{old('carry_percent')}}">
                      @error('carry_percent')
                      <code>{{$message}}</code>
                      @enderror
                  </div>
                  <div class="form-group col-md-2" style="margin-top: 30px;">
                    <span class="btn btn-primary addeventmore"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
        </div>
	</div>
</div>



<!-- Extra Add Item -->
<script type="text/javascript">
  $(document).ready(function(){
    var counter = 0;
    $(document).on("click",".addeventmore", function(){
      var whole_extra_item_add = $("#whole_extra_item_add").html();
      $(this).closest(".add_item").append(whole_extra_item_add);
      counter+; 
    });
    $(document).on("click",".removeeventmore", function(event){
      $(this).closest(".delete_whole_extra_item_add").remove();
      counter -=1;
    });
  });
</script>

@endsection
