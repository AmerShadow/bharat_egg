@extends('layouts.admin')
@section('content')
<div class="row p-0 m-0 justify-content-center" >
	<div class="col-md-10 card p-3 m-2">
		<div class="text-center">
			<img class="" src="{{asset('img/logo.png')}}" width="100px" height="80px">
		</div>
		
		<h3 class="h3 text-center">{{@App\Test::where('id',$id)->value('title')}}</h3>
		<h5 class="h5 text-center">No Questions:{{@App\Test::where('id',$id)->value('no_qtn')}}&ensp;&ensp;Marks:{{@App\Test::where('id',$id)->value('marks')}}&ensp;&ensp;No Duration:{{@App\Test::where('id',$id)->value('duration')}}&ensp;&ensp;</h4>
		<hr>
		<div class="text-right">
			<a class="btn btn-sm btn-info">Print</a>
		</div>
		
		<div class="p-4">

			@foreach($qtn as $row)
			<h5 class="h5 text-left">1)&ensp;{{$row->qtn}}</h5>
			<div class="row p-0 m-0">
				<div class="col-md-6">
					<h6 class="h5 text-left">A)&ensp;{{$row->A}}</h6>
				</div>
				<div class="col-md-6">
					<h6 class="h5 text-left">B)&ensp;{{$row->B}}</h6>
				</div>
				<div class="col-md-6">
					<h6 class="h5 text-left">C)&ensp;{{$row->C}}</h6>
				</div>
				<div class="col-md-6">
					<h6 class="h5 text-left">D)&ensp;{{$row->D}}</h6>
				</div>
				<div class="col-md-6">
					<h6 class="h5 text-left">Answer)&ensp;{{$row->ans}}</h6>
				</div>
			</div>
				
			
			@endforeach
		</div>
		
	</div>
</div>
@endsection