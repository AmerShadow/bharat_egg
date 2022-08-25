@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Bill History</h1>
@stop

@section('content')

    <div class="row">
		  <div class="col-md-12" style="height: 700px;overflow-y: scroll;">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Stock Out For {{@App\Customer::where('id',$id)->value('name')}}</h3>

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
                  <th>Type</th>
                  <th>Quantity</th>
                  <th>Amount</th>
                  <th>Payment</th>
                  <th>Payment Balance</th>
                  <th>Deposit Tray</th>
                  <th>Balance Tray</th>
                  <th>Action</th>   
                </tr>
                <?php
                $a=0;
                $p=0;
                $b=0;
                $e=0;
                $bt=0;
                 ?>
                @foreach(@$stock as $row)
                <tr>
                  <td>{{$row->date}}</td>
                  <td>@if($row->bill_type=='R') Reciept @else Primary Bill @endif </td>
                  <td>{{$row->quantity}}</td>
                  <td>{{$row->amount}}</td>
                  <td>{{$row->payment}}</td>
                  <td>{{$row->payment_balance}}</td>
                  <td>{{$row->deposit_t}}</td>
                  <td>{{$row->balance_t}}</td>
                  <?php
                    $a +=$row->amount;
                    $p +=$row->payment;
                    $b +=$row->amount-$row->payment;
                    $e +=$row->deposit_t;
                    $bt +=$row->balance_t-$row->deposit_t;
                    

                  ?>
                  <td>  @if($row->bill_type=='R')
                   <a href="{{route('print_rec',$row->id)}}" target="_blank"><span class="label label-danger"><i class="fa fa-eye"></i>&ensp;Print reciept</span></a>
                  @else
                    <a href="{{route('print_bill',$row->id)}}" target="_blank"><span class="label label-warning"><i class="fa fa-eye"></i>&ensp;Print Bill</span></a>
                  @endif
                  </td>
                </tr>
                @endforeach
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><i class="fa fa-rupee"></i>{{$a}}</th>
                  <th> <i class="fa fa-rupee"></i>{{$p}}</th>
                  <th><i class="fa fa-rupee"></i>{{$b}}</th>
                  <th>{{$e}} </th>
                  <th>{{$bt}}</th>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      
      </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
