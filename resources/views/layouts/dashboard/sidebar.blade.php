<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>wenreco</title>

        <!-- Favicon-->
        
        <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}" />
        <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}" />

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Wenrerco</div>
                <div class="list-group list-group-flush">
                    <!-- <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Dashboard</a> -->
                   
                    @if(Auth::check() && Auth::user()->is_admin  == "1")
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('admin.route')}}">Dashbord</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="allcustomers">Customers</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="allpayments">Payments </a>
                    <!-- <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Others</a> -->
                    @elseif(Auth::check() && Auth::user()->is_admin  == "0")
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('customers.payment')}}">Make Payment</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('mypayment')}}">My payments</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('contactadmin')}}">Contact admin</a>
                    <!-- <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Others</a> -->
                    @endif
                    
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle"><i class="fas fa-bars"></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <!-- <div class="dropdown-divider"></div> -->
                                        <a class="dropdown-item" href="{{route('useraccount')}}">Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">change password</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link {{ request()->routeIs('logout') ? 'active' : '' }}">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
    
    <script>
        function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
    </script>
    
    <script>
    function calculate(){
    var uganda_amount= document.getElementById('uganda_amount').value;
    // calcialate vat
    var vat=document.getElementById('vat');
    var calculated_vat=uganda_amount*0.18
    //service fee
    var service_fee=document.getElementById('service_fee');
    var calculated_service_fee=500
    //cost of units
    var cost_of_units=document.getElementById('cost_of_units');
    var cost_of_units_calculated=uganda_amount-(calculated_service_fee+calculated_vat)
    // units calculated
    var unit_cost=706.5
    var calculated_units=cost_of_units_calculated / unit_cost
    // amount in dollars.......we convert to dollars because paypal works in dollars
    var dollar_amount=document.getElementById('amount');
    var calculated_dollar=uganda_amount / 3571;

    // token
    var rand= document.getElementById("token").innerHTML =Math.floor(Math.random()  * 899999999999999 + 10000000000000);

    
    vat.value=Math.max(0, Math.trunc(calculated_vat));
    dollar_amount.value=Math.max(0, calculated_dollar);
    service_fee.value=Math.max(0, Math.trunc(calculated_service_fee));
    cost_of_units.value=Math.max(0, Math.trunc(cost_of_units_calculated));
    units.value=Math.max(0, Math.round((calculated_units+Number.EPSILON)*100)/100);
    token.value=rand;
    return true; 
}
        </script>
    </body>
</html>
