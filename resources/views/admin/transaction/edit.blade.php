@extends('layouts.admin')
@section('container')

<section id="transaction" class="transaction mt-5">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="mb-3">Transaction</h3>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-xl-6 ">
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Booking Id</li>
          <li class="list-group-item" style="width: 60%">{{ $transaction->booking_id }}</li>
        </ul>
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Customer</li>
          <li class="list-group-item" style="width: 60%">{{ $transaction->booking->user->name }}</li>
        </ul>
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Barberman</li>
          <li class="list-group-item" style="width: 60%">{{ $transaction->booking->barberman->barberman_name }}</li>
        </ul>
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Service</li>
          <li class="list-group-item" style="width: 60%">{{ $transaction->booking->service->service_name }}</li>
        </ul>
      </div>
      <div class="col-xl-6 mb-3">
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Date</li>
          <li class="list-group-item" style="width: 60%">{{ $transaction->booking->booking_date }}</li>
        </ul>
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Time</li>
          <li class="list-group-item" style="width: 60%">{{ $transaction->booking->booking_time }}</li>
        </ul>
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Status</li>
          <li class="list-group-item" style="width: 60%">{{ $transaction->booking->booking_status }}</li>
        </ul>
        <ul class="list-group list-group-horizontal ">
          <li class="list-group-item" style="width: 40%">Price</li>
          <li class="list-group-item" style="width: 60%">IDR {{ $transaction->booking->service->service_price }}</li>
        </ul>
      </div>
    </div>
    <hr>
    <div class="row mt-3">
      <div class="col-xl-6 ">
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Transaction Id</li>
          <li class="list-group-item" style="width: 60%">{{ $transaction->transaction_id }}</li>
        </ul>
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Discount</li>
          <li class="list-group-item" style="width: 60%">{{ $transaction->transaction_discount }} %</li>
        </ul>
        <form action="/admin/transaction/discount/{{ $transaction->transaction_id }}" method="POST">
          @method('PUT')
          @csrf
          <div class="input-group mb-3">
            <input type="num" class="form-control" placeholder="Set Discount (%)" id="transaction_discount" name="transaction_discount" {{ ($transaction->transaction_status == 'Done') ? 'disabled' : '' }}>
            <button class="btn btn-primary" type="submit" name="submit" {{ ($transaction->transaction_status == 'Done') ? 'disabled' : '' }}>Submit</button>
          </div>
        </form>
      </div>
      <div class="col-xl-6 mb-3">
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Date</li>
          <li class="list-group-item" style="width: 60%">{{ $transaction->transaction_date }}</li>
        </ul>
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Status</li>
          <li class="list-group-item" style="width: 60%">{{ $transaction->transaction_status }}</li>
        </ul>
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Amount</li>
          <li class="list-group-item" style="width: 60%">IDR {{ $transaction->transaction_amount }}</li>
        </ul>
      </div>
    </div>
    @if ($transaction->transaction_status ==  'Waiting')
    <div class="row mb-3">
      <form action="/admin/transaction/update/{{ $transaction->transaction_id }}" method="POST">
      @method('PUT')
      @csrf
      <div class="col">
          <div class="d-grid gap-2">
            <button class="btn btn-primary" name="transaction_status" value="Done">Done</button>
          </div>
        </div>
      </form>
    </div>
    @endif
    @if ($transaction->transaction_status ==  'Done')
    <div class="d-grid gap-2 mb-3">
      <a target="_blank" href="/admin/transaction/print/{{ $transaction->transaction_id }}" class="btn btn-primary">Print</a>
    </div>
    @endif
    <div class="d-grid gap-2">
      <a href="/admin/transaction" class="btn btn-light">Back</a>
    </div>
  </div>

</section>
    
@endsection