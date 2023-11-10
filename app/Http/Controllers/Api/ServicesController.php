<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\User;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function getAll()
    {
        $services = Service::with('provider')->get();

        return response()->json([
            'status' => true,
            'data' => $services
        ]);

    }
    
    public function getProviders()
    {
        $providers = User::where('user_role', 'provider')
        ->with('business_sub_sector.business_sector', 'services.types.service_type', 'provider_schedule')->get();

        return response()->json([
            'status' => true,
            'data' => $providers
        ]);

    }
    
    public function getSingleProviders($id)
    {
        $provider = User::where('user_role', 'provider')->where('id', $id)
        ->with('business_sub_sector.business_sector', 'services.types.service_type', 'provider_schedule')->first();

        return response()->json([
            'status' => true,
            'data' => $provider
        ]);

    }
    
    public function getServiceTypes()
    {
        $types = ServiceType::all();

        return response()->json([
            'status' => true,
            'data' => $types
        ]);

    }

}
