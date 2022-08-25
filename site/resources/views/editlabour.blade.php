   @extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Labour Expense</h1>
@stop

@section('content')
   	<div class="col-md-4">
            <div class="box box-info">

            <div class="box-header with-border">

              <h3 class="box-title">Expense Labour</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('edit',$user->id)}}" method="POST">
              @csrf
              {{$errors}}

                <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <label for="address" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" value="{{$user->address}}">
                  </div>
                </div>
              <div class="form-group">
                  <label for="mobileno" class="col-sm-2 control-label">Mobile No</label>

                  <div class="col-sm-10">
                    <input type="text" name="mobileno" class="form-control" id="mobileno" value="{{$user->mobileno}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="payment" class="col-sm-2 control-label">Payment</label>

                  <div class="col-sm-10">
                    <input type="text" name="payment" class="form-control" id="payment" value="{{$user->payment}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="advance" class="col-sm-2 control-label">Advance</label>

                  <div class="col-sm-10">
                    <input type="text" name="advance" class="form-control" id="advance" value="{{$user->advance}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="balance" class="col-sm-2 control-label">Balance</label>
                  <div class="col-sm-10">
                    <input type="text" name="balance" class="form-control" id="balance" value="{{$user->balance}}">
                  </div>
                </div>
                <div class="form-group">
               <label for="date" class="col-sm-2 control-label">Date:</label>
                <div class="col-sm-10">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="date" class="form-control pull-right" id="datepicker">
                </div>
            </div>
                <!-- /.input group -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">

                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>


 @stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
