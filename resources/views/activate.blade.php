@extends('layout.app')

@section('content')






<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Enter Lisence Key</h4><br><br>

 
    <div id="user_info">
    
    </div>
	
	<form action="{{url('/activate_key')}}" method="post">
        @csrf
        
        <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Lisence Key</label>
            <div class="col-sm-8">
            <input type="text" name="key" class="form-control" id="inputkey" placeholder="Lisence Key">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
            <button type="submit" id="submit" class="btn btn-primary btn-block">Activate</button>
            </div>
        </div>                                

        <div class="form-group row">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
            <a href="{{url('/login')}}">Return to login page.</a>
            </div>
        </div>  

       

        

    </form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->


@endsection



