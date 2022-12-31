@extends('layouts.dashboard.sidebar')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h6 class="text-white">Send message to the admin</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('sendemail')}}" enctype="multipart/form-data">
                            @csrf
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
                            <div class="form-group">
                                <label><strong>Subject</strong></label>
                                <input type="text" name="subject" class="form-control"/>
                            </div>  
                            <div class="form-group">
                                <label><strong>Body :</strong></label>
                                <textarea class="ckeditor form-control" name="body"></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary ">send</button>
                            </div>
                        </form>
                    </div>
                </div>
               
</body>
   

@endsection
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>