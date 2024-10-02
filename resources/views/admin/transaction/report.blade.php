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
      <div class="col-xl-6">
        <h3 class="mb-3">Transaction Report</h3>
      </div>
      <div class="col-xl-6 mb-3 text-end">
        <form action="/admin/transaction/report/print" method="post">
          @csrf
          <div class="row">
            <div class="col-5">
              <input type="date" class="form-control" id="transaction_date" name="transaction_date">
            </div>
            <div class="col-5">
              <input type="date" class="form-control" id="transaction_date2" name="transaction_date2">
            </div>
            <div class="col-2">
              <button class="btn btn-primary" type="submit" name="submit">Print</button>
            </div>
          </div>
        </form>
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
                <th scope="col">Transaction</th>
                <th scope="col">Booking</th>
                <th scope="col">Discount</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transactions as $transaction)    
              <tr>
                <td>{{ $transaction->transaction_status }}</td>
                <td>{{ $transaction->transaction_date }}</td>
                <td>{{ $transaction->transaction_id }}</td>
                <td>{{ $transaction->booking_id }}</td>
                <td>{{ $transaction->transaction_discount }} %</td>
                <td>IDR {{ $transaction->transaction_amount }}</td>
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