<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Transaction</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
    }
  </style>
</head>
<body>
  

<section id="transaction" class="transaction mt-5">
  <div class="container">
    <div class="row">
      <div class="col">
        <h2 class="mb-3">Barbersquad - Transaction</h2>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-xl-6 ">
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Booking Id</li>
          <li class="list-group-item" style="width: 60%; font-weight: bold;">{{ $transaction->booking_id }}</li>
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
          <li class="list-group-item" style="width: 60%; font-weight: bold;">{{ $transaction->transaction_id }}</li>
        </ul>
        <ul class="list-group list-group-horizontal mb-3">
          <li class="list-group-item" style="width: 40%">Discount</li>
          <li class="list-group-item" style="width: 60%">{{ $transaction->transaction_discount }} %</li>
        </ul>
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
  </div>

</section>
    
</body>
</html>