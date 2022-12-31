@extends('layouts.dashboard.sidebar')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- <h2>My payment</h2> -->
<div class="card">
              <div class="card-header bg-primary">
                <h6 class="card-title text-white" >Sucessful payments</h6>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="" class="table table-bordered table-striped table-responsive">
                  <thead>
                  <tr>
                    <th>Meter number</th>
                    <th>Amount</th>
                    <th>Token</th>
                    <th>units</th>
                    <th>date</th>
                    <th>View</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($payments as $pay)
                  <tr>
                  <td>{{ $pay->meter_number}}</td>
                  <td>{{ $pay->amount}}</td>
                  <td>{{ $pay->token}}</td>
                  <td>{{ $pay->units}}</td>
                  <td>{{ $pay->created_at}}</td>
                  <td ><i data-toggle="modal" data-target="#edit-modal{{$pay->id}}" style="cursor: pointer;"><i style="color:Dodgerblue" class="fas fa-eye fa-lg"></i></i> 
                     <div class="modal fade" id="edit-modal{{$pay->id}}">
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
                            <tr><td>Transaction Date</td><td>:</td><td style="padding-left:10px">{{ $pay->created_at}}</td></tr>
                            <tr><td>Meter Number</td><td>:</td><td style="padding-left:10px">{{ $pay->meter_number}}</td></tr>
                            <tr><td>Trans ID</td><td>:</td><td style="padding-left:10px">{{ $pay->transaction_id}}</td></tr>
                            <tr><td>Amount</td><td>:</td><td style="padding-left:10px">{{ $pay->amount}}</td></tr>
                            <tr><td>Cost of units</td><td>:</td><td style="padding-left:10px">{{ $pay->cost_of_units}}</td></tr>
                            <tr><td>VAT (18%)</td><td>:</td><td style="padding-left:10px">{{ $pay->vat}}</td></tr>
                            <tr><td>Service fee</td><td>:</td><td style="padding-left:10px">{{ $pay->service_fee}}</td></tr>
                            <tr><td>Token</td><td>:</td><td style="padding-left:10px">{{ $pay->token}}</td></tr>
                            <tr><td>Units</td><td>:</td><td style="padding-left:10px">{{ $pay->units}} kWh</td></tr>
                            <tr><td colspan="3">*******************************************************************</td></tr>
                            <tr><td colspan="3"><i>Thank you for paying with us. Call <b>+256 787788722</b><i></td></tr>
                              
                          </table>
                      </div>
                    </div>
                    </div>
                  </div>
                  </td>
                  </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Meter number</th>
                    <th>Amount</th>
                    <th>Token</th>
                    <th>units</th>
                    <th>date</th>
                    <th>view</th>
                  </tr>
                  </tfoot>
                </table>
                <div class="d-flex justify-content-center">
                {!! $payments->links() !!}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
@endsection
