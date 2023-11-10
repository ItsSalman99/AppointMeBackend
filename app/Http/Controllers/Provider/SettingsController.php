<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function businessDetails()
    {
        // dd(Auth::user());

        return view('provider.settings.business-details');

    }

    public function updateBusinessDetails(Request $request)
    {
        // dd($request->all());

        $user = User::where('id', auth()->user()->id)->first();

        if($user)
        {
            if($request->hasFile('img'))
            {
                $filename = $request->getSchemeAndHttpHost() . '/uploads/imgs/' . $request->img->getClientOriginalName();
                $request->img->move(public_path('/uploads/imgs/'), $filename);

                $user->profile_img = $filename;
            }

            $user->name = $request->name;
            $user->business_name = $request->business_name;
            $user->sms_name = $request->sms_name;
            // $user->email = $request->email;
            $user->phone = $request->phone;
            $user->business_description = $request->business_description;
            $user->save();
        }

        return redirect()->back();

    }

    public function location()
    {
        // dd(Auth::user());

        return view('provider.settings.location');

    }

    public function availability()
    {
        // dd(Auth::user());

        return view('provider.settings.availability');

    }

    public function payments()
    {
        // dd(Auth::user());

        return view('provider.settings.payments');

    }

    public function accountSettings()
    {
        // dd(Auth::user());

        return view('provider.account-settings');

    }
}
