@extends('layouts.user')
@section('container')

<section id="booking" class="booking mt-5">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="mb-3">Booking</h3>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Our Booking Policy</h5>
            <p class="card-text">
              <ul>
                <li>Book at anytime.</li>
                <li>Input an active telephone number, if the telephone number is not active, we will remove it from the schedule.</li>
                <li>More than 15 minutes late we considering cancel.</li>
                <li>The cancel confirmation limit is 2 hours before.</li>
              </ul>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-xl-6 mb-3">
        <div class="card">
          <ul class="list-group list-group-flush">
            @foreach ($services as $service)
              <li class="list-group-item">
                <p class="mb-1">{{ $service->service_name }} (IDR {{ $service->service_price }})</p>
                <p class="text-secondary">{{ $service->service_description }}</p>
              </li>
            @endforeach       
          </ul>
        </div>
      </div>
      <div class="col-xl-6">
        <div class="card">
          <div class="card-body">
            <form action="/booking/store" method="POST">
              @csrf
              <input type="hidden" id="booking_id" name="booking_id" value="{{ "BOK" . date('ymd') . rand(100, 999) }}">
              <input type="hidden" id="booking_status" name="booking_status" value="Waiting">
              <input type="hidden" id="customer_id" name="customer_id" value="{{ auth()->user()->id }}">
              <div class="mb-3">
                <label for="Service" class="form-label">Service</label>
                <select class="form-select" name="service_id" >
                  @foreach ($services as $service)
                      @if (old('service_id') == $service->service_id)
                          <option value="{{ $service->service_id }}" selected>{{ $service->service_name }}</option>
                          @else
                          <option value="{{ $service->service_id }}">{{ $service->service_name }}</option>
                      @endif
                  @endforeach
                  </select>
              </div>
              <div class="mb-3">
                <label for="Barberman" class="form-label">Barberman</label>
                <select class="form-select" name="barberman_id" >
                  @foreach ($barbermen as $barberman)
                      @if (old('barberman_id') == $barberman->barberman_id)
                          <option value="{{ $barberman->barberman_id }}" selected>{{ $barberman->barberman_name }}</option>
                          @else
                          <option value="{{ $barberman->barberman_id }}">{{ $barberman->barberman_name }}</option>
                      @endif
                  @endforeach
                  </select>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" name="submit" class="btn btn-primary">Choose Schedule</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
    
@endsection