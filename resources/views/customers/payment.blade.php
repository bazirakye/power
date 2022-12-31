@extends('layouts.dashboard.sidebar')

@section('content')

<script>
function activate() {
  var checkBox = document.getElementById("tm");
  if (checkBox.checked == true){
    document.getElementById('uganda_amount').removeAttribute('readonly');
    document.getElementById('meter_no').removeAttribute('readonly');
    document.getElementById('submit').removeAttribute('disabled');

  } else{
    document.getElementById('uganda_amount').setAttribute()('readonly');
    document.getElementById('meter_no').setAttribute()('readonly');
    document.getElementById('meter_no').removeAttribute('disabled');

  }
}


</script>
<div class="card">
    <div class="card-header bg-primary">
    <h6 class="card-title text-white">Make payment</h6>
    </div>
    <div class="card-body">
    <div class="col" style="margin-bottom:30px">
                <input type="checkbox" value="" id="tm" onclick="activate()"></label>    
                <span>By checking the box you agree with the </span><cite><a href="#">terms<a></cite>

                @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif

                @if ($message = Session::get('error'))
                <div class="custom-alerts alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('error');?>
                @endif

        <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! URL::route('paypal') !!}" >
          <!-- {{ csrf_field() }} -->
            @csrf
            <!-- notifiying the user -->
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

                    <!-- notfying the user -->
                </div>
            <div class="row">
              <div class="col">
                    <lable>Meter Number</lable>
                    <input type="text" pattern="[0-9.]+" minlength="11" maxlength="11" id="meter_no" name="meter_no" class="form-control" placeholder="Meter number only 11 integers" readonly required>
                </div>
                <div class="col">
                    <lable>Amount</lable>
                    <input type="number" name="uganda_amount" id="uganda_amount" required class="form-control" onclick="calculate()" onkeyup="calculate()" placeholder="Amount in Uganda shillings" readonly>
                </div>
                
                </div>

                <input type="hidden" name="amount" id="amount">
                @if ($errors->has('amount'))
                    <span class="help-block">
                      <strong>{{ $errors->first('amount') }}</strong>
                    </span>
                @endif
                <input type="hidden" name="token" id="token">


            <div class="row">
            <div class="col">
                    <lable>Service fee</lable>
                    <input type="number" id="service_fee" name="service_fee" class="form-control" placeholder="Amount in Uganda shillings" readonly>
                </div>
               
                <div class="col">
                    <lable>VAT (18%)</lable>
                    <input type="number" id="vat" name="vat" class="form-control"  placeholder="Value Added Tax" readonly >
                </div>
                </div>
            <div class="row">
                <div class="col">
                    <lable>Cost of units</lable>
                    <input type="number" id="cost_of_units" name="cost_of_units" class="form-control" placeholder="Amount in Uganda shillings" readonly>
                </div>
                <div class="col">
                    <lable>Number of Units (kWh)</lable>
                    <input type="number" name="units" id="units" class="form-control" placeholder="Number of units" readonly >
                </div>
            </div>
            <div class="row">
                <div class="col">
                    
                    <button type="submit" id="submit" style= "margin-top:30px" class="btn btn-primary" disabled>
                      Paywith Paypal
                    </button>
                </div>
            </div>

        </form>
       
    </div>     
</div>


@endsection
