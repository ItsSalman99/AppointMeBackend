<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\ProviderSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountSettingController extends Controller
{
    public function accountSettings()
    {
        // dd(Auth::user());
        
        $schedule = ProviderSchedule::where('user_id', Auth::user()->id)->get();
        
        return view('provider.account-settings', get_defined_vars());
            
    }
    
    public function updateScheduleDays(Request $request)
    {
        
        // dd($request->all());
        $previous = ProviderSchedule::where('user_id', Auth::user()->id)->get();
        
        foreach($previous as $previous)
        {
            $previous->delete();
        }
        
        foreach($request->days as $day)
        {
            $provider = new ProviderSchedule();
            
            $provider->user_id = Auth::user()->id;
            $provider->name = $day;
            $provider->save();
            
        }
        
        return redirect()->back();
            
    }
}
