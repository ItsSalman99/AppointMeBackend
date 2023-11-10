<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\ProviderSchedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{

    public function index()
    {

        $schedule = ProviderSchedule::where('user_id', auth()->user()->id)
            ->first();

        return view('provider.schedule.index', get_defined_vars());
    }

    public function updateScheduleDays(Request $request)
    {

        // dd($request->all());

        $days = $request->days;

        $filteredDays = array_filter($days, function ($day) {
            return $day !== '' && $day !== null;
        });

        $filteredDays = array_values($filteredDays);

        $open_time = $request->open_time;

        $filteredOpenTime = array_filter($open_time, function ($open_time) {
            return $open_time !== '' && $open_time !== null;
        });

        $filteredOpenTime = array_values($filteredOpenTime);


        $close_time = $request->close_time;

        $filteredCloseTime = array_filter($close_time, function ($close_time) {
            return $close_time !== '' && $close_time !== null;
        });

        $filteredCloseTime = array_values($filteredCloseTime);

        if(count($filteredDays) != count($filteredOpenTime) || count($filteredDays) != count($filteredCloseTime))
        {
            return response()->json([
                'status' => false,
                'msg' => 'Provide all correct details!'
            ]);
        }

        $previous = ProviderSchedule::where('user_id', Auth::user()->id)->get();

        foreach ($previous as $previous) {
            $previous->delete();
        }

        foreach ($request->days as $key => $day) {
            $provider = new ProviderSchedule();

            $provider->user_id = Auth::user()->id;
            $provider->name = $day;
            $provider->open_time = $filteredOpenTime[$key];
            $provider->close_time = $filteredCloseTime[$key];
            $provider->save();
        }

        return response()->json([
            'status' => true,
            'msg' => 'Updated Successfully!'
        ]);
    }
}
