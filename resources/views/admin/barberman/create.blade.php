@extends('layouts.admin')
@section('container')

<section id="barberman" class="barberman mt-5">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="mb-3">Barberman</h3>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <form action="/admin/barberman/store" method="POST">
              @csrf
              <div class="mb-3">
                <label for="barberman_name" class="form-label">Name</label>
                <input type="text" class="form-control @error('barberman_name') is-invalid @enderror" id="barberman_name" name="barberman_name" value="{{ old('barberman_name') }}">
                @error('barberman_name') 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="barberman_username" class="form-label">Username</label>
                <input type="text" class="form-control @error('barberman_username') is-invalid @enderror" id="barberman_username" name="barberman_username" value="{{ old('barberman_username') }}">
                @error('barberman_username') 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="barberman_email" class="form-label">Email address</label>
                <input type="email" class="form-control @error('barberman_email') is-invalid @enderror" id="barberman_email" name="barberman_email" value="{{ old('barberman_email') }}">
                @error('barberman_email') 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="barberman_telephone" class="form-label">Telephone</label>
                <input type="tel" class="form-control @error('barberman_telephone') is-invalid @enderror" id="barberman_telephone" name="barberman_telephone" value="{{ old('barberman_telephone') }}">
                @error('barberman_telephone') 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="barberman_address" class="form-label">Address</label>
                <textarea class="form-control @error('barberman_address') is-invalid @enderror" id="barberman_address" name="barberman_address" rows="3">{{ old('barberman_address') }}</textarea>
                @error('barberman_address') 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="row">
                <div class="col">
                  <div class="d-grid gap-2">
                    <a href="/admin/barberman" class="btn btn-light">Back</a>
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