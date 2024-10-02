@extends('layouts.admin')
@section('container')

<section id="booking" class="booking mt-5">
  <div class="container">
    @if (session()->has('success'))  
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="row">
      <div class="col">
        <h3 class="mb-3">Booking</h3>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="table-responsive">
          <table class="table">
            <thead class="table-light">
              <tr>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Service</th>
                <th scope="col">Customer</th>
                <th scope="col">Telephone</th>
                <th scope="col">Barberman</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bookings as $booking)    
              <tr>
                <td>{{ $booking->booking_status }}</td>
                <td>{{ $booking->booking_date }}</td>
                <td>{{ $booking->booking_time }}</td>
                <td>{{ $booking->service->service_name }}</td>
                <td>{{ $booking->user->name }}</td>
                <td>{{ $booking->user->telephone }}</td>
                <td>{{ $booking->barberman->barberman_name }}</td>
                <td>
                  <a href="/admin/booking/edit/{{ $booking->booking_id }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
    
@endsection