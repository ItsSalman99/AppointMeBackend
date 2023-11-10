<?php

use App\Models\ProviderSchedule;

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

