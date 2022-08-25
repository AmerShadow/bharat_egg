@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop
@section('content')
<div class="col-md-12">
  <form action="{{route('search_bs')}}" method="POST">
    @csrf
    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
               <label for="date" class="col-sm-2 control-label">From Date:</label>
                <div class="col-sm-10">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="date_from" class="form-control pull-right" id="datepicker">
                </div>
            </div>
                <!-- /.input group -->
              </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
               <label for="date" class="col-sm-2 control-label">To Date:</label>
                <div class="col-sm-10">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" name="date_to" class="form-control pull-right" id="datepicker">
                </div>
            </div>
                <!-- /.input group -->
              </div>
      </div>
      <div class="col-md-2">
        <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </div>
  </form>
</div>
<div class="col-md-12" style="height: 700px;overflow-y: scroll;">
  
	<div class="box box-danger">
            <div class="box-header"> 
            <h1 class="text-center "><img src="svg/logo.svg" style="width: 100px;height: 100px" ></h1>
            <h3 class="text-center " style="color: red;margin-top: 0px;" >BALANCE SHEET</h3>          
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
                <tr style="background-color: red;color: white">
                  <th>Date</th>
                  <th>Stock Purchase</th>
                  <th>Stock Sold</th>
                  <th>Amount deposited</th>
                  <th>Balance</th>
                  <th>Expense</th>
                  <th>Damage loses</th>
                  
                  <?php

                   $per=0;
                   $sal=0;
                   $b=0;
                   $ex=0;
                   $am=0;
                   $dm=0;
                  ?>
                </tr>
                 @foreach($credit as $key=>$row)
                  <tr>
                    
                    <td>{{$key}}</td>
                    <td>{{$perc=@App\Inventory::where('created_at',$key)->sum('p_price')}}</td>
                    <td>{{$row}}</td>
                    <td>{{$debit[$key]}}</td>
                    <td>{{$balance[$key]}}</td>
                    <td>{{$exp=@App\Expense::where('created_at',$key)->sum('amount')}}</td>
                    <td>{{$dmg=@App\Damage::where('created_at',$key)->sum('total')}}</td>
                  </tr>
                  <?php
                  $per = $per+$perc;
                  $sal=$sal+$row; 
                  $am=$am+$debit[$key];
                  $b=$b+$balance[$key];
                  $ex=$ex+$exp;
                  $dm=$dm+$dmg;
                  ?>
                 @endforeach
                 <tr style="background-color: red;color: white">
                  <th></th>
                <th><i class="fa fa-rupee"></i>{{$per}}</th>
                  <th><i class="fa fa-rupee"></i>{{$sal}}</th>
                  <th><i class="fa fa-rupee"></i>{{$am}}</th>
                  <th><i class="fa fa-rupee"></i>{{$b}}</th>
                  <th><i class="fa fa-rupee"></i>{{$ex}}</th>
                  <th><i class="fa fa-rupee"></i>{{$dmg}}</th>
                  
        </tr>
              </table>
            </div>
             
          </div>
  
</div>

@stop