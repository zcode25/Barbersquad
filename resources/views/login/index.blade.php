@extends('layouts.main')
@section('container')

  <section id="login" class="login mt-5">
    <div class="container">
      <div class="row text-center">
        <div class="col-xl-6 col-md-6 mx-auto">
          <h3 class="mb-3 fw-bold">Barbersquad</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-xl-6 col-md-6 mx-auto">
          @if (session()->has('success'))  
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @if (session()->has('loginError'))  
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginError') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <div class="card">
            <div class="card-body">
              <form action="/login/authenticate" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                  @error('email') 
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                  @error('password') 
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
              </form>
              <small class="d-block text-center my-3">Not registed? <a href="/register" class="text-decoration-none text-primary">Register Now!</a></small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection