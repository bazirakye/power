@extends('layouts.dashboard.sidebar')
@section ('content')

<div class="content-wrapper">
	<section class="content">

        <div class="card-header bg-primary">
           <h6 class="card-title text-white">My account</h6>              			
        </div>

        <div class="card card-primary">             
            <div class="card-body col-10">                               
                <form method="post" action="{{route('updateuser')}}" enctype="multipart/form-data" class="form-control">@csrf
                	<!-- @if(session('message'))
                		<div class="alert alert=success" role="alert">
                		{{session('message')}}
                		</div>
                	@endif -->
                	@if ($message = Session::get('success'))
					<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
        			<strong>{{ $message }}</strong>
					</div>
					@endif

					@if ($message = Session::get('error'))
					<div class="alert alert-danger alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
        			<strong>{{ $message }}</strong>
					</div>
					@endif

					@if ($message = Session::get('warning'))
					<div class="alert alert-warning alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
					<strong>{{ $message }}</strong>
					</div>
					@endif

					@if ($message = Session::get('info'))
					<div class="alert alert-info alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>	
					<strong>{{ $message }}</strong>
					</div>
					@endif

					@if ($errors->any())	
					<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">×</button>	
					Please check the form below for errors
					</div>
					@endif

					
                	<div class="form-group" style="margin-top:20px">

                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="{{$user['name']}}" required="required">
                </div>
                <div class="form-group" style="margin-top:20px">
                    <label for="email"  >Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{$user['email']}}" placeholder="email" required="required">
                </div>
                
                <!-- <div class="form-group">
                    <button type="button" class="btn btn-outline-success btn-sm" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Change password</button>

                    <div class="collapse" id="collapseExample">
                    	    <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="password" class="form-control" name="currentpassword" placeholder="current password">
                                    </div>
                                
                                    <div class="col-6 ">
                                        <input type="password" class="form-control" name="password" placeholder="confirm password">
                                    </div>
                                </div> 
                            </div>
                    </div>	
					
                </div> -->
                
				<div class="form-group" style="margin-top:20px">
						<button type="submit" class="btn btn-primary">Update</button>

						<button type="submit" style="float:right;" name="reset" id="reset" class="btn btn-secondary">reset</button>
				</div>
                </form>    
         	</div>       
        </div>
    </section>
</div>

        
@endsection