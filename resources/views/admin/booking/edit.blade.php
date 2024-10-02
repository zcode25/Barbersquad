@extends('layouts.admin')
@section('container')

<section id="booking" class="booking mt-5">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="mb-3">Booking</h3>
      </div>
    </div>
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
    </div>
    @if ($booking->booking_status == 'Waiting')
        <form action="/admin/booking/update/{{ $booking->booking_id }}" method="POST">
          @method('PUT')
          @csrf
          <div class="row mb-3">
            <div class="col">
              <div class="d-grid gap-2">
                <button class="btn btn-danger" name="booking_status" value="Cancel">Cancel</button>
              </div>
            </div>
            <div class="col">
              <div class="d-grid gap-2">
                <button class="btn btn-primary" name="booking_status" value="Accept">Accept</button>
              </div>
            </div>
          </div>
        </form>
    @endif
    @if ($booking->booking_status ==  'Accept')
        <form action="/admin/booking/update/{{ $booking->booking_id }}" method="POST">
          @method('PUT')
          @csrf
          <div class="row mb-3">
            <div class="col">
              <div class="d-grid gap-2">
                <button class="btn btn-primary" name="booking_status" value="Done">Done</button>
              </div>
            </div>
          </div>
        </form>
    @endif
    <div class="d-grid gap-2">
      <a href="/admin/booking" class="btn btn-light">Back</a>
    </div>
  </div>

</section>
    
@endsection