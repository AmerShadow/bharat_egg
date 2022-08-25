@extends('layouts.admin')
@section('content')

<div class="row justify-content-center p-0 m-0">
	<div class="col-lg-12 text-center">
		@include('partials.alert')
				<div class="container mt-5">
					<div class="card z-depth-5  text-center  p-5 mb-2">
					<h3>{{@App\Test::where('id',$id)->value('title')}}</h3>
					
						<div class="table-responsive">
		<table class="table table-fixed ">
		  <thead class="black white-text">
		    <tr>
		      
		      <th scope="col">Question</th>
		      <th scope="col">Subject</th>
		      <th scope="col">Options</th>
		      <th scope="col">Ans</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach(@App\Question::where('test_id',$id)->where('type','T')->get() as $row)
			  <tr>
			  	<td> {{$row->qtn}}</td>
			  	<td> {{App\Subject::where('id',$row->subject)->value('name')}}</td>
			  	<td> A:-{{$row->A}}<br>B:-{{$row->B}}<br>C:-{{$row->C}}<br>D:-{{$row->D}}<br></td>
			  	<td>{{$row->ans}}</td>
			  	<td> <a href="{{route('del.qtn',$row->id)}}" class="badge badge-danger p-2">Delete Question </a>

			  	</td>
			  </tr>
			 @endforeach
		  </tbody>
		</table>
		  </div>
		  <div class="table-responsive">
		<table class="table table-fixed ">
		  <thead class="black white-text">
		    <tr>
		      
		      <th scope="col">Image</th>
		      <th scope="col">Subject</th>
		      <th scope="col">Answer</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach(@App\Question::where('test_id',$id)->where('type','I')->get() as $row)
			  <tr>
			  	<td> <img src="{{asset('public/questions/'.$row->path)}}"></td>
			  	<td> {{App\Subject::where('id',$row->subject)->value('name')}}</td>
			  	
			  	<td>{{$row->ans}}</td>
			  	<td> <a href="{{route('del.qtn',$row->id)}}" class="badge badge-danger p-2">Delete Question </a>

			  	</td>
			  </tr>
			 @endforeach
		  </tbody>
		</table>
		  </div>
		  <div class="col-lg-12 text-center">
		<a class="btn btn-outline-success" href="{{route('save',$id)}}">save </a>
	</div>
					</div>
				</div>
		</div>



	<div class="col-lg-6 text-center">
		<div class="container mt-5">
			<div class="card z-depth-5  text-center  p-3 mb-2">
			<h3>Add Question</h3>
		
			<form action="{{route('admin.sub.qtn')}}" method="POST">
			{{csrf_field()}}
				<select class="select mb-4 mt-4" name="sub" id="ans" required>
	                            <option value="">Select Subject</option>

	                           @foreach(App\Subject::all() as $row)
	                           		<option value="{{$row->name}}">{{$row->name}}</option>
	                           @endforeach
	                            
	            </select>
	            <textarea class="md-textarea form-control mb-4" row="5" name="qtn">Type question Here </textarea>
				<input class="form-control mb-4" type="text" placeholder="Option A" name="optn1">
				<input class="form-control mb-4" type="text" placeholder="Option B" name="optn2">
				<input class="form-control mb-4" type="text" placeholder="Option C" name="optn3">
				<input class="form-control mb-4" type="text" placeholder="Option D" name="optn4">
				<select class="select mb-4" name="ans" id="ans" required>
	                            <option value="">Select Answer</option>
	                          
	                           		<option value="A">A</option>
	                           		<option value="B">B</option>
	                           		<option value="C">C</option>
	                           		<option value="D">D</option>
	                           
	                            
	            </select>
	            <input type="text" name="test_id" value="{{$id}}" class="d-none">
				<button class="btn btn-md btn-outline-secondary" type="submit">Submit</button>
			</form>
			</div>
		</div>
	</div>
<div class="col-md-6">
	<div class="row p-0 m-0">
			<div class="col-lg-12 text-center">
		<div class="container mt-5">

			<div class="card z-depth-5  text-center  p-3 mb-2">
				 @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif
 
    @if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('error') }}</strong>
    </div>
    @endif
 
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      <div>
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
</div>
@endif
 
			<h3>Import Questions(Excell sheet)</h3>
		
			<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
    Choose your xls/csv File : <input type="file" name="file" class="form-control">
				
	            <input type="text" name="test_id" value="{{$id}}" class="d-none">

				<button class="btn btn-md btn-outline-secondary" type="submit">Submit</button>
			</form>
			</div>
		</div>
	</div>


	<div class="col-lg-12 text-center">
		<div class="container mt-5">

			<div class="card z-depth-5  text-center  p-3 mb-2">
				 @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif
 
    @if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('error') }}</strong>
    </div>
    @endif
 
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
      <div>
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
</div>
@endif
 
			<h3>Import Questions(image format)</h3>
		
			<form action="{{ route('image') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<select class="select mb-4 mt-4" name="subject" id="ans" required>
	                            <option value="">Select Subject</option>
	                            
	                           @foreach(App\Subject::all() as $row)
	                           		<option value="{{$row->name}}">{{$row->name}}</option>
	                           @endforeach
	                            
	            </select>
    Choose your image File : <input type="file" name="image" class="form-control">
    <select class="select mb-4" name="ans" id="ans" required>
	                            <option value="">Select Answer</option>
	                          
	                           		<option value="A">A</option>
	                           		<option value="B">B</option>
	                           		<option value="C">C</option>
	                           		<option value="D">D</option>
	                           
	                            
	            </select>
				
	            <input type="text" name="test_id" value="{{$id}}" class="d-none">
				<button class="btn btn-md btn-outline-secondary" type="submit">Submit</button>
			</form>
			</div>
		</div>
	</div>
	</div>
</div>


</div>
@endsection