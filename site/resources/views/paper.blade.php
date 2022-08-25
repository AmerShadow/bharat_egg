@extends('layouts.testLayout')
@section('content')
<div class="col-md-9">
	<div class="card p-5">
		<h4 class="h4">Question No: </h4>
		<p class="pl-5 font-weight-bold">
			{{$qtn->qtn}}
		</p> 
		
		{{$qtn->A}}
		{{session('qtn_id')}}
		<a class="btn btn-primary" href="{{route('paper',$test_id)}}">Next</a>
	</div>
</div>
<div class="col-md-3">
</div>
	
@endsection