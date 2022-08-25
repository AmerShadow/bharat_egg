@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Vehical Expense</h1>
@stop

@section('content')

    <div class="row">
		  <div class="col-md-8" style="height: 700px;overflow-y: scroll;">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Vehical Expense </h3>

              <div class="box-tools">
                <form action="{{route('search_vh')}}" method="POST">
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
                  <th>Motor Name</th>
                  <th>Motor No</th>
                  <th>Info</th>
                  <th>Fuel</th>
                  <th>Maintenance</th>

                  <th>Paper Work</th>
                    <th>Total</th>
                </tr>
              <?php
               $f=0;
               $m=0;
               $b=0;
               $p=0;
               $t=0;
              ?>
                @foreach(@$exp as $row)
                <tr>
                  <td>{{$row->date}}</td>
                  <td>{{$row->motor_name}}</td>
                  <td>{{$row->motor_no}}</td>
                  <td>{{$row->info}}</td>
                  <td>{{$row->fuel}}</td>
                  <td>{{$row->maint}}</td>
                   <td>{{$row->payment_balance}}</td>
                    <td>{{$row->paper_work}}</td>
                    <td>{{$row->paper_work+$row->payment_balance+$row->maint+$row->fuel}}</td>
                <tr>
                  <?php
                    $f +=$row->fuel;
                    $m +=$row->maint;
                    $b +=$row->payment_balance;
                    $p +=$row->paper_work;
                    $t +=$row->paper_work+$row->payment_balance+$row->maint+$row->fuel;
                  ?>
                @endforeach
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><i class="fa fa-rupee"></i>{{$f}}</th>
                  <th><i class="fa fa-rupee"></i>{{$m}}</th>
                  <th><i class="fa fa-rupee"></i>{{$b}}</th>
                  <th><i class="fa fa-rupee"></i>{{$p}}</th>
                  <th><i class="fa fa-rupee"></i>{{$t}}</th>
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

              <h3 class="box-title">Expense Vehical</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('exp_vehical')}}" method="POST">
              @csrf

              <div class="box-body">
                <div class="form-group">
                  <label for="motor_name" class="col-sm-2 control-label">Motor Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="motor_name" class="form-control" id="motor_name" placeholder="Motor Name">
                  </div>
                </div>

              <div class="form-group">
                  <label for="motor_no" class="col-sm-2 control-label">Motor No</label>

                  <div class="col-sm-10">
                    <input type="text" name="motor_no" class="form-control" id="motor_no" placeholder="Motor No">
                  </div>
                </div>
                <div class="form-group">
                  <label for="info" class="col-sm-2 control-label">Info</label>

                  <div class="col-sm-10">
                    <input type="text" name="info" class="form-control" id="info" placeholder="Info">
                  </div>
                </div>
                <div class="form-group">
                  <label for="fuel" class="col-sm-2 control-label">Fuel</label>

                  <div class="col-sm-10">
                    <input type="text" name="fuel" class="form-control" id="fuel" placeholder="Fuel">
                  </div>
                </div>
                <div class="form-group">
                  <label for="maint" class="col-sm-2 control-label">Maintenance</label>
                  <div class="col-sm-10">
                    <input type="text" name="maint" class="form-control" id="maint" placeholder="Maintenance">
                  </div>
                </div>

                <div class="form-group">
                  <label for="paper_work" class="col-sm-2 control-label">Paper Work</label>
                  <div class="col-sm-10">
                    <input type="text" name="paper_work" class="form-control" id="paper_work" placeholder="Paper Work">
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
