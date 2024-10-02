@extends('layouts.admin')
@section('container')

<section id="customer" class="customer mt-5">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="mb-3">Customer</h3>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <form action="/admin/customer/update/{{ $user->id }}" method="POST">
              @method('PUT')
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}">
                @error('name') 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username) }}">
                @error('username') 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
                @error('email') 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="telephone" class="form-label">Telephone</label>
                <input type="tel" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone', $user->telephone) }}">
                @error('telephone') 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ old('address', $user->address) }}</textarea>
                @error('address') 
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="row">
                <div class="col">
                  <div class="d-grid gap-2">
                    <a href="/admin/customer" class="btn btn-light">Back</a>
                  </div>
                </div>
                <div class="col">
                  <div class="d-grid gap-2">
                    <button type="submit" name="submit" class="btn btn-primary">Edit</button>
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