@extends('layouts.admin')
@section('container')

<section id="barberman" class="barberman mt-5">
  <div class="container">
    @if (session()->has('success'))  
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="row">
      <div class="col">
        <h3 class="mb-3">Barberman</h3>
      </div>
      <div class="col text-end">
        <a href="/admin/barberman/create" class="btn btn-primary">Add</a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="table-responsive">
          <table class="table">
            <thead class="table-light">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Telephone</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($barbermen as $barberman)    
              <tr>
                <td>{{ $barberman->barberman_name }}</td>
                <td>{{ $barberman->barberman_email }}</td>
                <td>{{ $barberman->barberman_telephone }}</td>
                <td>
                  <a href="/admin/barberman/edit/{{ $barberman->barberman_id }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                  <form action="/admin/barberman/delete/{{ $barberman->barberman_id }}" class="d-inline" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                  </form>
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