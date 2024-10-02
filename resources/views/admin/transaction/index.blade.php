@extends('layouts.admin')
@section('container')

<section id="transaction" class="transaction mt-5">
  <div class="container">
    @if (session()->has('success'))  
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="row">
      <div class="col">
        <h3 class="mb-3">Transaction</h3>
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
                <th scope="col">Booking</th>
                <th scope="col">Discount</th>
                <th scope="col">Amount</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transactions as $transaction)    
              <tr>
                <td>{{ $transaction->transaction_status }}</td>
                <td>{{ $transaction->transaction_date }}</td>
                <td>{{ $transaction->booking_id }}</td>
                <td>{{ $transaction->transaction_discount }} %</td>
                <td>IDR {{ $transaction->transaction_amount }}</td>
                <td>
                  <a href="/admin/transaction/edit/{{ $transaction->transaction_id }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
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