<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\ServiceBooking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = ServiceBooking::where('provider_id', auth()->user()->id)->get();

        return view('provider.bookings.index', get_defined_vars());
    }

    public function scheduleBooking($id)
    {

        $booking = ServiceBooking::where('id', $id)->first();

        if ($booking) {
            $booking->status = 'scheduled';
            $booking->save();
        }

        return redirect()->back();
    }

    public function cancelBooking($id)
    {

        $booking = ServiceBooking::where('id', $id)->first();

        if ($booking->status != 'pending') {
            return response()->json([
                'status' =>  false,
                'msg' => 'This booking can not cancelled!'
            ]);
        }

        if ($booking) {
            $booking->status = 'cancelled';
            $booking->cancel_reason = 'service provider';
            $booking->save();
        }

        return response()->json([
            'status' =>  true,
            'msg' => 'Booking cancelled!'
        ]);

    }
}
