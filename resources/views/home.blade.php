@extends('layout.app')

@section('content')






<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Lisence</h4><br><br>

    <!-- <table class="table table-striped">
        <tbody>
            <tr>
                <th scope="row">First Name</th>
                <td>Mark</td>
            </tr>
            <tr>
                <th scope="row">Last Name</th>
                <td>Mark</td>
            </tr>
            <tr>
                <th scope="row">Name of Organization</th>
                <td>Jacob</td>
            </tr>
            <tr>
                <th scope="row">City</th>
                <td>Larry</td>
            </tr>
            <tr>
                <th scope="row">Phone</th>
                <td>Mark</td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td>Mark</td>
            </tr>
            <tr>
                <th scope="row">Lisence Key</th>
                <td>Mark</td>
            </tr>
            
        </tbody>
    </table> -->
    <div id="user_info">
    
    </div>
	
	<form action="{{url('/generate_key')}}" method="post">
        @csrf
        <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Client Id</label>
            <div class="col-sm-8">
            <input type="text" name="id" class="form-control" id="inputId" placeholder="Client Id">
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Lisence Key</label>
            <div class="col-sm-8">
            <input type="text" name="key" class="form-control" id="inputkey" placeholder="Lisence Key">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
            <button type="submit" id="submit" class="btn btn-primary btn-block">Save</button>
            </div>
        </div>                                
          

        <div class="form-group row">
            <label  class="col-sm-4 col-form-label">Lisence For</label>
            <div class="col-sm-8">
            <select class="form-control" name="month">
			<option selected=""> Select Month</option>
			<option value="3">3 Month</option>
			<option value="6">6 Month</option>
			<option value="12">12 Month</option>
		</select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-7"></div>
            <div class="col-sm-5">
            <a class="btn btn-primary" id="create_key" >Create Key</a>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4"><a href="{{url('/activate')}}">Activate</a></div>
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

@section('jquery')
    <script>
        $('#inputId').change(function(){
            var id=$('#inputId').val();

            $.ajax({
                url: '{{url('/user_info')}}',
                type: 'get',
                data: {'id': id },
                success: function (data) {
                    let txt=`<table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">First Name</th>
                                <td>${data.f_name}</td>
                            </tr>
                            <tr>
                                <th scope="row">Last Name</th>
                                <td>${data.l_name}</td>
                            </tr>
                            <tr>
                                <th scope="row">Name of Organization</th>
                                <td>${data.name_of_org}</td>
                            </tr>
                            <tr>
                                <th scope="row">City</th>
                                <td>${data.city}</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td>${data.phone}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>${data.email}</td>
                            </tr>
                            <tr>
                                <th scope="row">Lisence Key</th>
                                <td>${data.lisence_key}</td>
                            </tr>
                            
                        </tbody>
                    </table>`;
                    
                    $('#user_info').html(txt); 
                },error:function (response) {
                    
                }
            });
        });

        $("#create_key").click(function(){

            $.ajax({
                url: '{{url('/random_number')}}',
                type: 'get',
                
                success: function (data) {
                    $("#create_key").attr("disabled", true);
                    $('#inputkey').val(data); 
                },error:function (response) {
                    
                }
            });
        });
    </script>
@endsection

