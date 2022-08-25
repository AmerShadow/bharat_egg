@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Labour Expense</h1>
@stop

@section('content')

    <div class="row">
		  <div class="col-md-8">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Labour Expense </h3>

              <div class="box-tools">
                <form action="{{route('search_lab')}}" method="POST">
                  @csrf
                <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="mobile" class="form-control pull-right" placeholder="Search By Name">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>

                </div>
                 </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Mobile No</th>
                  <th>Payment</th>
                  <th>Advance</th>
                  <th>Balance</th>
                  <th>Action</th>
                </tr>
                <?php
                  $p=0;
                  $ad=0;
                  $b=0;
                ?>
                @foreach(@$exp as $row)
                <tr>
                  <td>{{$row->date}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->address}}</td>
                  <td>{{$row->mobileno}}</td>
                  <td>{{$row->payment}}</td>
                  <td>{{$row->advance}}</td>
                  <td>{{$row->balance}}</td>
                  <td><a href="{{route('edit',$row->id)}}"><span class="label label-primary">Edit</span></a></td>

                 </tr>
                 <?php
                  $p +=$row->payment;
                  $ad +=$row->advance;
                  $b +=$row->balance;
                 ?>
                @endforeach
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><i class="fa fa-rupee"></i>{{$p}}</th>
                  <th><i class="fa fa-rupee"></i>{{$ad}}</th>
                  <th><i class="fa fa-rupee"></i>{{$p-$ad}}</th>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      	<div class="col-md-4">
            <div class="box box-info">

            <div class="box-header with-border">

              <h3 class="box-title">Expense Labour</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('exp_labour')}}" method="POST">
              @csrf

                <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <label for="address" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" placeholder="Address">
                  </div>
                </div>
              <div class="form-group">
                  <label for="mobileno" class="col-sm-2 control-label">Mobile No</label>

                  <div class="col-sm-10">
                    <input type="text" name="mobileno" class="form-control" id="mobileno" placeholder="MobileNo">
                  </div>
                </div>
                <div class="form-group">
                  <label for="payment" class="col-sm-2 control-label">Payment</label>

                  <div class="col-sm-10">
                    <input type="text" name="payment" class="form-control" id="payment" placeholder="Payment">
                  </div>
                </div>
                <div class="form-group">
                  <label for="advance" class="col-sm-2 control-label">Advance</label>

                  <div class="col-sm-10">
                    <input type="text" name="advance" class="form-control" id="advance" placeholder="Advance">
                  </div>
                </div>
                <div class="form-group">
                  <label for="balance" class="col-sm-2 control-label">Balance</label>
                  <div class="col-sm-10">
                    <input type="text" name="balance" class="form-control" id="balance" placeholder="Balance">
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
      </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
