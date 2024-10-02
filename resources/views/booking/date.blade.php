@extends('layouts.user')
@section('container')

<section id="booking" class="booking mt-5">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="mb-3">Booking</h3>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-xl-6 mb-3">
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
      <div class="col-xl-6">
        @if (session()->has('error'))  
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="card">
          <div class="card-body">
            <form action="/booking/date/store/{{ $booking->booking_id }}" method="POST">
              @method('PUT')
              @csrf
              <div class="mb-3">
                <label for="booking_date" class="form-label">Date</label>
                <input type="date" class="form-control @error('booking_date') is-invalid @enderror" id="booking_date" name="booking_date" value="{{ old('booking_date') }}">
                @error('booking_date') 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="booking_time" class="form-label">Time</label>
                <select class="form-select" name="booking_time" >
                  <option value="09:00:00">09:00</option>
                  <option value="10:00:00">10:00</option>
                  <option value="11:00:00">11:00</option>
                  <option value="12:00:00">12:00</option>
                  <option value="13:00:00">13:00</option>
                  <option value="14:00:00">14:00</option>
                  <option value="15:00:00">15:00</option>
                  <option value="16:00:00">16:00</option>
                  <option value="17:00:00">17:00</option>
                  <option value="18:00:00">18:00</option>
                  <option value="19:00:00">19:00</option>
                  <option value="20:00:00">20:00</option>
                  <option value="21:00:00">21:00</option>
                </select>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" name="submit" class="btn btn-primary">Confirmation</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
    
@endsection