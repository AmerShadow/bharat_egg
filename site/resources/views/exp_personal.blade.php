@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Personal Expenses</h1>
@stop

@section('content')

    <div class="row">
		  <div class="col-md-6" style="height: 700px;overflow-y: scroll;">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Expense Personal</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Date</th>
                  <th>Name</th>
                  <th>Amount</th>
                     <?php
                     $am=0;
                     ?>
                </tr>
                @foreach(@$exp as $row)
                <tr>
                  <td>{{$row->date}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->amount}}</td>

                </tr>
                  <?php
                    $am +=$row->amount;
                  ?>
                @endforeach
                <tr>
                  <td></td>
                  <td></td>
                  <th><i class="fa fa-rupee"></i>{{$am}}</th>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      	<div class="col-md-6">
          <div class="box box-info">

            <div class="box-header with-border">

              <h3 class="box-title">Expense Personal</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('exp_personal')}}" method="POST">
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
                  <label for="amount" class="col-sm-2 control-label">Amount</label>
                  <div class="col-sm-10">
                    <input type="text" name="amount" class="form-control" placeholder="Amount">
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
