@extends('layouts.dashboard.sidebar')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
<script>
function activate() {
  var checkBox = document.getElementById("tm");
  if (checkBox.checked == true){
    document.getElementById('amount').removeAttribute('readonly');
    document.getElementById('units').removeAttribute('readonly');

  } else {
    document.getElementById('amount').setAttribute()('readonly');
    document.getElementById('units').setAttribute()('readonly');
  }
}
</script>
<div class="card w-75 justify-content-center">
    <div class="card-header">
    </h2>Welcome to the payment Module</h2>
    </div>
    <div class="card-body">
    <div class="col" style="margin-bottom:30px">
                <input type="checkbox" value="" id="tm" onclick="activate()"></label>    
                <span>By checking the box you agree with the </span><cite><a href="#">terms<a></cite>

        <form>                    
                </div>
            <div class="row">
                <div class="col">
                    <lable>Amount</lable>
                    <input type="number" id="amount" class="form-control" onclick="calculate()" onkeyup="calculate()" placeholder="Amount in Uganda shillings" readonly>
                </div>
                <div class="col">
                    <lable>Number of Units</lable>
                    <input type="number" id="units" class="form-control" onclick="calculate()" onkeyup="calculate()" placeholder="Number of units" readonly >
                </div>
                
            </div>
        </form>
    </div>     
</div>


@endsection
