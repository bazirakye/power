@extends('layouts.dashboard.sidebar')
@section('content')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->


     

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All customers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial No.</th>
                    <th>Customer name</th>
                    <th>Meter No.</th>
                    <th>Amount</th>
                    <th>Units</th>
                    <th>Payment Date</th>
                    <th>View</th>

                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $payment)
                  <tr>
                    <td>{{++$i}}</td>
                    <td>{{$payment->name}}</td>
                    <td>{{$payment->meter_number}}</td>
                    <td>{{$payment->amount}}</td>
                    <td>{{$payment->units}}</td>
                    <td>{{$payment->created_at}}</td>
                    <td ><i data-toggle="modal" data-target="#edit-modal{{$payment->id}}" style="cursor: pointer;"><i style="color:Dodgerblue" class="fas fa-eye fa-lg"></i></i> 
                     <div class="modal fade" id="edit-modal{{$payment->id}}">
                    <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <i style="color:Dodgerblue" class="fas fa-print fa-2x"></i>
                        <h3 class="modal-title text-white">Payment details</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                            <table>
                            <tr><td>Transaction Date</td><td>:</td><td style="padding-left:10px">{{ $payment->created_at}}</td></tr>
                            <tr><td>Customer name</td><td>:</td><td style="padding-left:10px">{{ $payment->name}}</td></tr>
                            <tr><td>Meter Number</td><td>:</td><td style="padding-left:10px">{{ $payment->meter_number}}</td></tr>
                            <tr><td>Trans ID</td><td>:</td><td style="padding-left:10px">{{ $payment->transaction_id}}</td></tr>
                            <tr><td>Amount</td><td>:</td><td style="padding-left:10px">{{ $payment->amount}}</td></tr>
                            <tr><td>Cost of units</td><td>:</td><td style="padding-left:10px">{{ $payment->cost_of_units}}</td></tr>
                            <tr><td>VAT (18%)</td><td>:</td><td style="padding-left:10px">{{ $payment->vat}}</td></tr>
                            <tr><td>Service fee</td><td>:</td><td style="padding-left:10px">{{ $payment->service_fee}}</td></tr>
                            <tr><td>Token</td><td>:</td><td style="padding-left:10px">{{ $payment->token}}</td></tr>
                            <tr><td>Units</td><td>:</td><td style="padding-left:10px">{{ $payment->units}} kWh</td></tr>
                            </table>
                  </tr>
                    @endforeach                
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Serial No.</th>
                    <th>Customer name</th>
                    <th>Meter No.</th>
                    <th>Amount</th>
                    <th>Units</th>
                    <th>PaymentDate</th>
                    <th>View</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Muni University</b> <?php echo date("Y")?>
    </div>
    <strong>Copyright &copy; <?php echo date("Y")?> <a href="#">muni FY project</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endsection