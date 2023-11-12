<?php

use App\Models\ProviderSchedule;
use App\Models\Service;

if(!function_exists('checkSchedule'))
{
    function checkSchedule($day)
    {
        $check = ProviderSchedule::where('user_id', auth()->user()->id)
        ->where('name', $day)->first();

        if($check)
        {
            return $check;
        }
        else{
            return null;
        }


    }
}


if(!function_exists('countServiceTotal'))
{
    function countServiceTotal($id)
    {
        $service = Service::where('id', $id)->first();

        $total = 0;

        if($service)
        {
            foreach ($service->types as $key => $type) {
                // dd($type);
                $total += $type->price;
            }
            return $total;
        }
        else{
            return $total;
        }


    }
}

