@extends('layouts.main')
@section('container')

  <section id="register" class="register mt-5 ">
    <div class="container">
      <div class="row text-center">
        <div class="col-xl-6 col-md-6 mx-auto">
          <h3 class="mb-3 fw-bold">Barbersquad</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-xl-6 col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">
              <form action="/register/store" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                  @error('name') 
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                  @error('username') 
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                  @error('email') 
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="telephone" class="form-label">Telephone</label>
                  <input type="tel" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone') }}">
                  @error('telephone') 
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                  @error('password') 
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ old('address') }}</textarea>
                  @error('address') 
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="d-grid gap-2">
                  <button type="submit" name="submit" class="btn btn-primary">Register</button>
                </div>
              </form>
              <small class="d-block text-center mt-3">Already registed? <a href="/" class="text-decoration-none text-primary">Login</a></small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection