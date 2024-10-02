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
        <h1 class="mb-3">Transaction Report</h1>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="table-responsive">
          <table class="table" width="100%">
            <thead class="table-light">
              <tr>
                <th scope="col" style="text-align: left">Status</th>
                <th scope="col" style="text-align: left">Date</th>
                <th scope="col" style="text-align: left">Transaction</th>
                <th scope="col" style="text-align: left">Booking</th>
                <th scope="col" style="text-align: left">Discount</th>
                <th scope="col" style="text-align: left">Amount</th>
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
              <tr>
                <td colspan="6"><hr></td>
              </tr>
              <tr>
                <td colspan="5">Total</td>
                <td>IDR {{ $transactions_sum }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
    
</body>
</html>