<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ServiceBooking;
use App\Models\ProviderSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SlotController extends Controller
{
    
    
    public function getSlots(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provider_id' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }
        
        $slots = [
            '09:00 AM - 10:00 AM',
            '10:00 AM - 11:00 AM',
            '11:00 AM - 12:00 AM',
            '12:00 AM - 01:00 PM',
            '01:00 PM - 02:00 PM',
            '02:00 PM - 03:00 PM',
            '03:00 PM - 04:00 PM',
            '04:00 PM - 05:00 PM',
            '05:00 PM - 06:00 PM',
            // Add more slots as needed
        ];
        
        // return $slots;
        $dayOfWeek = date("l", strtotime($request->date));

        $user = User::where('id', $request->provider_id)->where('user_role', 'provider')->first();
        
        if($user)
        {
            $providerSchedule = ProviderSchedule::where('user_id', $user->id)->where('name', $dayOfWeek)->first();
            
            if($providerSchedule)
            {
                $bookings = ServiceBooking::where('provider_id', $request->provider_id)
                ->where('status', '!=', 'Cancelled')->get();
                
                foreach ($bookings as $booking) {
                    $bookingTimeSlot = $booking->time_slot; // Assuming 'time_slot' is the name of the column in your database
                
                    // Find and remove the matching time slot from $slots
                    $key = array_search($bookingTimeSlot, $slots);
                    if ($key !== false) {
                        unset($slots[$key]);
                        $slots = array_values($slots);

                    }
                }
                
                return response()->json([
                    'status' => true,
                    'data' => $slots
                ]);
            }
            else{
                return response()->json([
                    'status' => false,
                    'msg' => 'No slots or schedule found!!'
                ]);    
            }
            
        }
        else {
            return response()->json([
                'status' => false,
                'msg' => 'Invalid Provider!'
            ]);
        }    
    
    }
    
    
}
