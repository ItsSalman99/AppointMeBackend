<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\ServiceBooking;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {

        $bookings = ServiceBooking::where('provider_id', auth()->user()->id)->pluck('user_id');


        $clients = User::whereIn('id', $bookings)->get();

        return view('provider.clients', get_defined_vars());
    }
}
