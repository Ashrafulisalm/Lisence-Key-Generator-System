@extends('layout.app')

@section('content')






<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>
	
	<form action="{{url('/register')}}" method="post">
    @csrf
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="f_name" class="form-control" placeholder="First name" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="l_name" class="form-control" placeholder="Last name" type="text">
    </div>

    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		 </div>
        <input name="name_of_org" class="form-control" placeholder="Name of Organization" type="text">
    </div>

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
    	<input name="phone" class="form-control" placeholder="Phone number" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
		</div>
    	<input name="city" class="form-control" placeholder="City" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
		</div>
    	<input name="street" class="form-control" placeholder="Street" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Create password" id="password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Repeat password" id="confirm_password" type="password">
        
    </div> <!-- form-group// -->                                      
    <div class="form-group">
        <button type="submit" id="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="{{route('login')}}">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->


@endsection

@section('jquery')
    <script>
        
        $('#password, #confirm_password').on('keyup', function () {
        
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#submit').prop("disabled",false);
                $('#confirm_password').css('color','green');
            } else {
                $('#submit').prop("disabled",true);
                $('#confirm_password').css('color','red');
            }
        });
    </script>

@endsection