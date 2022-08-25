@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Profile</h1>
@stop

@section('content')
<div class="col-md-12">

      		   <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{route('profile')}}" method="POST">
              @csrf
             
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$user->name}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="mobileno" class="col-sm-2 control-label">Mobileno1</label>

                  <div class="col-sm-10">
                    <input type="text" name="mobile1" class="form-control" id="mobileno" placeholder="Mobileno" value="{{$user->mobile1}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="mobileno2" class="col-sm-2 control-label">Mobileno2</label>

                  <div class="col-sm-10">
                    <input type="text" name="mobile2" class="form-control" id="mobileno2" placeholder="Mobileno" value="{{$user->mobile2}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="{{$user->address}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="col-sm-2 control-label">description</label>

                  <div class="col-sm-10">
                    <input type="text" name="description" class="form-control" id="address" placeholder="Description" value="{{$user->description}}">
                  </div>
                </div>
                
             
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Create</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
</div>

@endsection