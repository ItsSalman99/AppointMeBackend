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
        
        return view('provider.bookings.index',get_defined_vars());
    }
}
