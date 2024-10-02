<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class TransactionController extends Controller
{
    public function index() {
        return view('admin.transaction.index', [
            'transactions'  => Transaction::orderBy('created_at', 'desc')->get()
        ]);
    }
    
    public function edit(Transaction $transaction) {
        return view('admin.transaction.edit', [
            'transaction' => $transaction
        ]);       
    }

    public function discount(Request $request, Transaction $transaction) {
        $validatedData = $request->validate([
            'transaction_discount'  => 'required',
            'transaction_amount',
        ]);

        $validatedData['transaction_amount'] = ($transaction->booking->service->service_price - (($validatedData['transaction_discount']/100) * $transaction->booking->service->service_price));

        Transaction::where('transaction_id', $transaction->transaction_id)->update($validatedData);
        
        return redirect('/admin/transaction/edit/'. $transaction->transaction_id);
    }

    public function update(Request $request, Transaction $transaction) {
        $validatedData = $request->validate([
            'transaction_status'  => 'required',
        ]);

        Transaction::where('transaction_id', $transaction->transaction_id)->update($validatedData);
        
        return redirect('/admin/transaction/edit/'. $transaction->transaction_id);
    }

    public function print(Transaction $transaction) {
        set_time_limit(300);
        $pdf = Pdf::loadView('admin.transaction.print', [
            'transaction' => $transaction
        ]);
        return $pdf->stream($transaction->transaction_id .'.pdf');
    }

    public function report() {
        return view('admin.transaction.report', [
            'transactions'  => Transaction::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function reportPrint(Request $request) {
        set_time_limit(300);
        $validatedData = $request->validate([
            'transaction_date'  => 'required',
            'transaction_date2'  => 'required',
        ]);
        
        $pdf = Pdf::loadView('admin.transaction.reportPrint', [
            'transactions'  => Transaction::whereBetween('transaction_date', [$validatedData['transaction_date'], $validatedData['transaction_date2']])->orderBy('created_at', 'desc')->get(),
            'transactions_sum'  => Transaction::whereBetween('transaction_date', [$validatedData['transaction_date'], $validatedData['transaction_date2']])->sum('transaction_amount')
        ]);
        return $pdf->stream('Report'. $validatedData['transaction_date'] .'.pdf');
    }

}
