@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Make bill Or Credit</h1>
@stop
@section('content')
	<div class="row">
		<div class="col-md-4">
			  <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Item To Bill DHF000{{$billnum}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('sell')}}" method="POST">
              @csrf
              {{$errors}}
              <input type="text" name="bill_num" style="display: none;" value="{{$billnum}}">
              <div class="box-body">
                 <div class="form-group">
                <label class="col-sm-2 control-label" >Customer</label>
                <div class="col-sm-10">
                <select name="cust_id" class="form-control select2" style="width: 100%;" >
                  @foreach(@$customer as $row)
                  <option value="{{$row->id}}" @if(@$cust_id==$row->id) Selected @endif>{{$row->name}}</option>
                  @endforeach
                </select>
            </div>
              </div>
                 <div class="form-group">
                <label class="col-sm-2 control-label">Item</label>
                <div class="col-sm-10">
                <select name="inv_id" class="form-control select2" style="width: 100%;" id="inv_id">
                 
                  
                 @foreach($stock as $row)
					<option value="{{$row->inv_id}}">{{@App\Inventory::where('id',$row->inv_id)->value('fruit_name')}}---{{@App\Category::where('id',$row->cat_id)->value('name')}}{{@App\Category::where('id',$row->cat_id)->value('count')}}{{@App\Category::where('id',$row->cat_id)->value('quality')}}</option>
                 @endforeach
                </select>
            </div>
              </div>
                <div class="form-group">
                  <label for="quantity" class="col-sm-2 control-label">Quantity</label>

                  <div class="col-sm-10">
                    <input type="number" name="quantity" class="form-control" id="quantity" placeholder="quantity">
                  </div>
                </div>
                <div class="form-group">
                  <label for="discount" class="col-sm-2 control-label">Price/Item</label>

                  <div class="col-sm-10">
                    <input type="number" name="p_price" class="form-control" id="pp" placeholder="Price/Item">
                  </div>
                </div>

                 <div class="form-group">
                  <label for="discount" class="col-sm-2 control-label">Discount</label>

                  <div class="col-sm-10">
                    <input type="number" name="discount" class="form-control" id="discount" placeholder="Discount">
                  </div>
                </div>
                <div class="form-group">
                  <label for="discount" class="col-sm-2 control-label">Credit</label>

                  <div class="col-sm-10">
                    <input type="number" name="credit" class="form-control" id="credit" placeholder="credit">
                  </div>
                </div>
                <div class="form-group">
                  <label for="discount" class="col-sm-2 control-label">Debit</label>

                  <div class="col-sm-10">
                    <input type="number" name="debit" class="form-control" id="debit" placeholder="Debit">
                  </div>
                </div>
                <div class="form-group">
                  <label for="discount" class="col-sm-2 control-label">Balance</label>

                  <div class="col-sm-10">
                    <input type="number" name="balance" class="form-control" id="balance" placeholder="Balance">
                  </div>
                </div>
                <!--<div class="form-group">
                  <label for="amount" class="col-sm-2 control-label">Amount</label>

                  <div class="col-sm-10">
                    <input type="text" name="amount" class="form-control" id="amount" placeholder="Amount">
                  </div>
                </div>
                <div class="form-group">
                  <label for="total" class="col-sm-2 control-label">Total</label>

                  <div class="col-sm-10">
                    <input type="text" name="total" class="form-control" id="total" placeholder="Total">
                  </div>
                </div>
                <div class="form-group">
                  <label for="pay_type" class="col-sm-2 control-label">Payment Type</label>

                  <div class="col-sm-10">
                    <input type="text" name="pay_type" class="form-control" id="pay_type" placeholder="Payment Type">
                  </div>
                </div> -->
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit" class="btn btn-info pull-right">ADD</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
		</div>
		<div class="col-sm-8">
    <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Bill DHF000{{$billnum}}</h3>

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
                  <th>Reciept_no</th>
                  <th>Perticulars</th>
                  <th>Quantity</th>
                  <th>Credit</th>
                  <th> Debit</th>
                  <th>Discount</th>
                  <th>Balance</th>
                </tr>
                @foreach(@App\Sale::where('bill_num',$billnum)->get() as $row)
                <tr>
                  <td>{{$row->created_at}}</td>
                  <td>DHF000{{$billnum}}</td>
                  <td>{{@App\Inventory::where('id',$row->inv_id)->value('fruit_name')}}---{{@App\Category::where('id',@App\Inventory::where('id',$row->inv_id)->value('cate_id'))->value('name')}}.{{@App\Category::where('id',@App\Inventory::where('id',$row->inv_id)->value('cate_id'))->value('count')}}.{{@App\Category::where('id',@App\Inventory::where('id',$row->inv_id)->value('cate_id'))->value('quality')}}</td>
                  
                  
                  <td>{{$row->quantity}}</td>
                  <td>{{$row->credit}}</td>
                  <td>{{$row->debit}}</td>
                  <td>{{$row->discount}}%</td>
                  <td>{{$row->balance}}</td>
                  <td><a href="{{route('sale_del',$row->id)}}"><span class="label label-danger">Delete</span></a></td>
                  
                </tr>
                @endforeach
              </table>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr style="background-color: red;color: white">
                  <th></th>
                  <th></th>
                 
                  <th>Total </th>
                  <?php $total=0;
                    $total_d=0;
                    $total_b=0;
                  ?>
                  @foreach(@App\Sale::where('bill_num',$billnum)->get() as $row)
                    
          
                    <?php  $total +=$row->credit;
                      $total_d +=$row->debit;
                      $total_b +=$row->balance;

                    ?>
                    
@endforeach

                  <th>Credit:{{$total}}</th>
                  <th>Debit:{{$total_d}}</th>
                  <th>Balance:{{$total_b}}</th>

  
                </tr>
            </table>
          </div>
          <div class="col-sm-12 text-right">
            <a href="{{route('c_bill',$billnum)}}" target="_blank"><span class="label label-success">Generate bill</span></a> 
          </div>
    </div>			
	</div>
  <div class="col-sm-12">
      <div class="box box-danger">
            <div class="box-header">  
               <h1 class="text-center "><img src="{{asset('svg/logo.svg')}}" style="width: 100px;height: 100px" ></h1>
            <h3 class="text-center " style="color: red;margin-top: 0px;" >LEAGDER (Sale)</h3>         
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
              <table class="table table-hover table-fixed">
                <thead style="background-color: red;color: white">
                  <tr >
                  <th>Date</th>
                  <th>Reciept_no</th>
                  <th>Perticulars</th>
                  <th>Quantity</th>
                  <th>Credit</th>
                  <th> Debit</th>
                  <th>Balance</th>
                  <th>Action</th>
                  
                  
                </tr>
                </thead>
                <tbody style="height:200px;overflow-y:auto;width: 100%;">
                  <?php
                $total=0;
                  $credit=0;
                  $debit=0;
                ?>
               
                @foreach(@$inv as $row)
                <tr>
                  <td>{{$row->created_at}}</td>
                <td>DHF000{{$row->bill_num}}</td>
                
                <td>{{App\Inventory::where('id',$row->inv_id)->value('fruit_name')}}</td>
                <td>{{$row->quantity}}</td>
                <td>{{$row->debit}}</td>
                <td>{{$row->credit}}</td>
                
                <td>{{$row->balance}}</td>
                <td><form method="POST" action="{{route('update_bill',[$row->id,$row->bill_num])}}">
                  {{csrf_field()}}
                  <input type="number" name="amount">
                  <button type="submit" class="btn label label-info"> <i class="fa fa-rupee"></i>&ensp;Add amount</button>
                </form></td>
                </tr>
                 <?php 
                      $total +=$row->balance;
                        $credit+=$row->credit;
                        $debit+=$row->debit;
                    
                  ?>
                @endforeach
                </tbody>
                
                
        <tr style="background-color: red;color: white">
           <th></th>
                  <th></th>
                  <th></th>
                  <th>Total</th>
                  <th><i class="fa fa-rupee"></i>{{$debit}}</th>
                  <th><i class="fa fa-rupee"></i>{{$credit}} </th>
                  <th><i class="fa fa-rupee"></i>{{$total}}</th>
                  <th></th>
        </tr>
              </table>
            </div>
             
           
          </div>
  </div>
</div>





@stop
@section('css')
<style type="text/css">
  
</style>
@stop
@section('js')
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#discount').on('change',function(e){
    			var disc_am=$('#quantity').val()*$('#pp').val()*($('#discount').val()/100)
    			$('#credit').val(($('#quantity').val()*$('#pp').val())-disc_am);
    		});
    		$('#debit').on('change',function(e){
    			
    			$('#balance').val($('#credit').val()-$('#debit').val());
    		});
    		});
    	

 
    $("#inv_id").select2({
                 
                });
    
    </script>
@stop
