@extends('layouts.user')
@section('container')

<section id="booking" class="booking mt-5">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="mb-3">Booking History</h3>
      </div>
    </div>
    @foreach ($bookings as $booking)      
    <div class="row mt-3">
      <div class="col-xl-6 ">
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Booking Id</li>
          <li class="list-group-item" style="width: 60%">{{ $booking->booking_id }}</li>
        </ul>
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Customer</li>
          <li class="list-group-item" style="width: 60%">{{ $booking->user->name }}</li>
        </ul>
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Barberman</li>
          <li class="list-group-item" style="width: 60%">{{ $booking->barberman->barberman_name }}</li>
        </ul>
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Service</li>
          <li class="list-group-item" style="width: 60%">{{ $booking->service->service_name }}</li>
        </ul>
      </div>
      <div class="col-xl-6 mb-3">
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Date</li>
          <li class="list-group-item" style="width: 60%">{{ $booking->booking_date }}</li>
        </ul>
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Time</li>
          <li class="list-group-item" style="width: 60%">{{ $booking->booking_time }}</li>
        </ul>
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Status</li>
          <li class="list-group-item" style="width: 60%">{{ $booking->booking_status }}</li>
        </ul>
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Price</li>
          <li class="list-group-item" style="width: 60%">IDR {{ $booking->service->service_price }}</li>
        </ul>
      </div>
      <div class="d-grid gap-2 mb-5">
        <a target="_blank" href="/booking/print/{{ $booking->booking_id }}" class="btn btn-primary">Download</a>
      </div>
    </div>
    @endforeach
  </div>

</section>
    
@endsection