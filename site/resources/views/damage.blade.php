@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Damaged Stock</h1>
@stop
@section('content')
	<div class="row">
		  <div class="col-xs-12" style="height: 700px;overflow-y: scroll;">
		  	@include('partials.alert')
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Damage Stock</h3>

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
                  
                  <th>Quantity</th>
                  <th>Total</th>
                  
                  
                </tr>
                @foreach(@$stock as $row)
                <tr>
                  <td>{{$row->quantity}}</td>
                  <td>{{$row->total}}</td>
                 
                 
                  
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      	
      </div>
@stop