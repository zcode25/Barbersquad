<?php

namespace App\Http\Controllers;

use App\Models\Barberman;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    public function index() {
        return view('booking.index', [
            'services'  => Service::all(),
            'barbermen' => Barberman::all()
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'booking_id'        => 'required',
            'booking_status'    => 'required',
            'customer_id'       => 'required',
            'service_id'        => 'required',
            'barberman_id'      => 'required',
        ]);

        Booking::create($validatedData);

        return redirect('/booking/date/'. $validatedData['booking_id']);
    }

    public function date(Booking $booking) {
        return view('booking.date', [
            'booking'  => $booking,
        ]);
    }

    public function date_store(Request $request, Booking $booking) {
        $validatedData = $request->validate([
            'booking_date'  => 'required',
            'booking_time'  => 'required',
        ]);

        $error = Booking::where('barberman_id', '=', $booking->barberman_id)->where('booking_date', '=', $request->booking_date)->where('booking_time', '=', $request->booking_time)->count();
        if($error == 1) {
            return redirect('/booking/date/'. $booking->booking_id)->with('error', 'Schedule has been booked!');;
        }

        Booking::where('booking_id', $booking->booking_id)->update($validatedData);
        
        return redirect('/booking/confirmation/'. $booking->booking_id);
    }

    public function confirmation(Booking $booking) {
        return view('booking.confirmation', [
            'booking'  => $booking,
        ]);
    }

    public function history() {
        return view('booking.history', [
            'bookings'  => Booking::where('customer_id', auth()->user()->id)->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function print(Booking $booking) {
        set_time_limit(300);
        $pdf = Pdf::loadView('booking.print', [
            'booking' => $booking
        ]);
        return $pdf->stream($booking->booking_id .'.pdf');
    }
}
