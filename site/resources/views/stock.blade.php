@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Stock Management</h1>
@stop

@section('content')

    <div class="row">
    	<div class="col-xs-4">
    		<div class="box box-info">

            <div class="box-header with-border">

              <h3 class="box-title">Add Stock</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('stock')}}" method="POST">
              @csrf

              <div class="box-body">
                <div class="form-group">
                  <label for="quantity" class="col-sm-3 control-label">Quantity</label>

                  <div class="col-sm-9">
                    <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Quantity">
                  </div>
                </div>
                <div class="form-group">
                  <label for="rate" class="col-sm-3 control-label">Rate</label>

                  <div class="col-sm-9">
                    <input type="number" name="rate" class="form-control" step="0.01" id="rate" placeholder="Rate">
                  </div>
                </div>
                <div class="form-group">
                  <label for="amount" class="col-sm-3 control-label">Amount</label>
                  <div class="col-sm-9">
                    <input type="number" name="amount" class="form-control" id="amount" step="0.01" placeholder="Amount">
                  </div>
                </div>
                <div class="form-group">
                  <label for="payment" class="col-sm-3 control-label">Payment</label>

                  <div class="col-sm-9">
                    <input type="number" name="payment" class="form-control" id="payment" step="0.01" placeholder="Payment">
                  </div>
                </div>
                <div class="form-group">
                  <label for="payment balance" class="col-sm-3 control-label">Payment Balance</label>

                  <div class="col-sm-9">
                    <input type="number" name="payment_balance" class="form-control" step="0.01" id="payment_balance" placeholder="Payment Balance">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="balance_t" class="col-sm-3 control-label">Balance Tray</label>

                  <div class="col-sm-9">
                    <input type="text" name="balance_t" class="form-control" id="balance_t" placeholder="Balance Tray">
                  </div>
                </div>
                <div class="form-group">
               <label for="date" class="col-sm-3 control-label">Date:</label>
                <div class="col-sm-9">
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
		  <div class="col-xs-8" style="height: 700px;overflow-y: scroll;">
		  	@include('partials.alert')

          <div class="box box-danger">
            <div class="box-header">
              <h3 class=" text-center" style="margin:0;">{{@App\Seller::where('id',$id)->value('name')}}</h3>
              <h4 class=" text-center" style="margin:0;">Legder</h4>
              <h4 class=" text-center" style="margin:0;">{{@App\Seller::where('id',$id)->value('address')}}</h4>

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


                  <th>Quantity</th>
                  <th>Rate</th>
                  <th>amount</th>
                  <th> payment done</th>
                  <th>Balance</th>

                </tr>
                <?php
                $am=0;
                $p=0;
                $b=0;
                ?>
                @foreach(@$stock as $row)
                <tr>
                    <td>{{$row->date}}</td>
                    <td>{{$row->quantity}}</td>
                    <td>{{$row->rate}}</td>
                    <td>{{$row->amount}}</td>
                    <td>{{$row->payment}}</td>
                    <td>{{$row->payment_balance}}</td>
                </tr>
                <?php

                $am +=$row->amount;
                $p +=$row->payment;
                $b +=$row->payment_balance;
                ?>
                @endforeach
                <tr>
                 <th></th>
                 <th></th>
                 <th></th>
                 <th><i class="fa fa-rupee"></i>{{$am}}</th>
                 <th><i class="fa fa-rupee"></i>{{$p}}</th>
                 <th><i class="fa fa-rupee"></i>{{$b}}</th>

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
@section('js')
    <script type="text/javascript">
    	$(document).ready(function(){



    $("#cate_id").select2({

                });
    $("#amount").on('click',function(){
      $("#amount").val($("#quantity").val()*$("#rate").val());
    });

     $("#payment_balance").on('click',function(){
      $("#payment_balance").val($("#quantity").val()*$("#rate").val()-$("#payment").val());
    });

  });
    </script>
@stop

