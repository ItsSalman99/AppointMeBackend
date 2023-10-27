<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DoctorService;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function getAll()
    {
        $services = DoctorService::with('doctor')->get();

        return response()->json([
            'status' => true,
            'data' => $services
        ]);

    }

}
