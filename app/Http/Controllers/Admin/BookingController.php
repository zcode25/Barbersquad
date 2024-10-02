<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index() {
        return view('admin.booking.index', [
            'bookings' => Booking::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function edit(Booking $booking) {
        return view('admin.booking.edit', [
            'booking'  => $booking,
        ]);
    }

    public function update(Request $request, Booking $booking) {
        $validatedData = $request->validate([
            "booking_status"   => 'required',
        ]);

        if ($request->booking_status == 'Accept') {
            $validatedData['booking_status'] = 'Accept';
        } elseif ($request->booking_status == 'Cancel') {
            $validatedData['booking_status'] = 'Cancel';
        } elseif ($request->booking_status == 'Done') {
            $validatedData['booking_status'] = 'Done';
            Transaction::Create([
                'transaction_id'        => "TRS" . date('ymd') . rand(100, 999),
                'booking_id'            => $booking->booking_id,
                'transaction_date'      => $booking->booking_date,
                'transaction_discount'  => 0,
                'transaction_amount'    => $booking->service->service_price,
                'transaction_status'    => 'Waiting',
            ]);
        }

        Booking::where('booking_id', $booking->booking_id)->update($validatedData);
    
        return redirect('/admin/booking')->with('success', 'Booking Status has been updated!');
    }
}
