@extends('layouts.admin')
@section('container')

<section id="service" class="service mt-5">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="mb-3">Service</h3>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <form action="/admin/service/store" method="POST">
              @csrf
              <div class="mb-3">
                <label for="service_name" class="form-label">Service Name</label>
                <input type="text" class="form-control @error('service_name') is-invalid @enderror" id="service_name" name="service_name" value="{{ old('service_name') }}">
                @error('service_name') 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="service_description" class="form-label">Service Description</label>
                <textarea class="form-control @error('service_description') is-invalid @enderror" id="service_description" name="service_description" rows="3">{{ old('service_description') }}</textarea>
                @error('service_description') 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="service_price" class="form-label">Service Price (IDR)</label>
                <input type="num" class="form-control @error('service_price') is-invalid @enderror" id="service_price" name="service_price" value="{{ old('service_price') }}">
                @error('service_price') 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="row">
                <div class="col">
                  <div class="d-grid gap-2">
                    <a href="/admin/service" class="btn btn-light">Back</a>
                  </div>
                </div>
                <div class="col">
                  <div class="d-grid gap-2">
                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
@endsection