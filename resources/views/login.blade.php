@extends('layout.app')

@section('content')






<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Login to your account.</h4>
	
	<form action="{{url('/login')}}" method="post">
    @csrf
	
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
    	<input name="phone" class="form-control" placeholder="Phone number" type="text">
    </div> <!-- form-group// -->
    
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Create password" id="password" type="password">
    </div> <!-- form-group// -->
                                         
    <div class="form-group">
        <button type="submit" id="submit" class="btn btn-primary btn-block">Log In </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Are you new? <a href="{{route('register')}}">Register Here</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->


@endsection

