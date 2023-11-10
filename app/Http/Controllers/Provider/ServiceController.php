<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\ProviderServiceType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        // dd(Auth::user());
        $services = Service::where('user_id', auth()->user()->id)->get();
        $service_types = ServiceType::all();

        return view('provider.settings.services', get_defined_vars());

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'duration' => 'required',
            'color' => 'required',
            'service_type' => 'required|array|min:1',
            'location' => 'required',
            'service_price' => 'required|array|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        // dd($request->all());

        $service = new Service();
        $service->user_id = auth()->user()->id;
        $service->name = $request->name;
        $service->duration = $request->duration;
        $service->color = $request->color;
        $service->service_location = $request->location;
        $service->save();

        $service_types = $request->service_type;

        $filteredserviceTypes = array_filter($service_types, function ($service_types) {
            return $service_types !== '' && $service_types !== null;
        });

        $filteredserviceTypes = array_values($filteredserviceTypes);

        foreach($filteredserviceTypes as $key => $servicetype)
        {

            $service_types = new ProviderServiceType();
            $service_types->service_id = $service->id;
            $service_types->service_type_id = $servicetype;
            $service_types->price = $request->service_price[$key];
            $service_types->save();
        }


        return response()->json([
            'status' => true,
            'msg' => 'Service added successfully!'
        ]);

    }

    public function update(Request $request)
    {

        // dd($request->all());

        $service = Service::where('id', $request->service_id)->first();
        if($service)
        {
            $service->name = $request->name;
            $service->duration = $request->duration;
            $service->color = $request->color;
            $service->service_location = $request->location;
            $service->save();


        }


        return response()->json([
            'status' => true,
            'msg' => 'Service updated successfully!'
        ]);

    }

    public function delete($id)
    {
        // dd(Auth::user());

        $service = Service::where('id', $id)->first();
        if($service)
        {
            $service->delete();

        }

        return redirect()->back();

    }

}
