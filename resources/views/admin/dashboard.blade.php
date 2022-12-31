@extends('layouts.dashboard.sidebar')

@section('content')
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="{{asset('admin.css')}}" />


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<div class="container">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin dashboard</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-users"></i>
        <span class="">{{$users->count()}}</span>
        <span class="">users</span>
        <span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-ticket"></i>
        <span class="">{{$payments->count()}}</span>
        <span class="">payments</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fa fa-money"></i>
        <span class="">{{$totalmoney}}</span>
        <span class="">Ugs</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-users"></i>
        <span class="">{{$payments->count()}}</span>
        <span class="">money</span>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection