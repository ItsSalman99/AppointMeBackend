<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceBooking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{

    public function getAll()
    {
        $token = request()->bearerToken();

        $user = User::where('token', $token)->where('user_role', 'customer')->first();

        if ($user) {

            $bookings= ServiceBooking::where('user_id', $user->id)
            ->with('user', 'provider', 'service', 'service_type.service_type')->get();

            return response()->json([
                'status' => true,
                'data' => $bookings
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'unauthenticated!'
            ]);
        }
    }

    public function getByDate($date)
    {
        $token = request()->bearerToken();

        $user = User::where('token', $token)->where('user_role', 'customer')->first();

        if ($user) {

            $parseDate  = Carbon::parse($date);
            // return $parseDate;
            $bookings= ServiceBooking::where('user_id', $user->id)
            ->whereDate('date',$parseDate)
            ->with('user', 'provider', 'service', 'service_type.service_type')->get();

            return response()->json([
                'status' => true,
                'data' => isset($bookings) ? $bookings : 'Not Found!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'unauthenticated!'
            ]);
        }
    }

    public function getDetails($id)
    {
        $token = request()->bearerToken();

        $user = User::where('token', $token)->where('user_role', 'customer')->first();

        if ($user) {

            // return $parseDate;
            $bookings= ServiceBooking::where('user_id', $user->id)
            ->where('id',$id)
            ->with('user', 'provider', 'service', 'service_type.service_type')->first();

            return response()->json([
                'status' =>  true,
                'data' => isset($bookings) ? $bookings : 'Not Found!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'unauthenticated!'
            ]);
        }
    }

    public function cancelBooking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'booking_id' => 'required',
            'cancel_reason' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }
        $token = request()->bearerToken();

        $user = User::where('token', $token)->where('user_role', 'customer')->first();

        if ($user) {

            // return $parseDate;
            $booking= ServiceBooking::where('user_id', $user->id)
            ->where('id',$request->booking_id)
            ->with('user', 'provider', 'service', 'service_type.service_type')->first();

            if($booking)
            {
                $booking->status = 'cancelled';
                $booking->cancel_reason = $request->cancel_reason;
                $booking->save();

                return response()->json([
                    'status' =>  true,
                    'data' => $booking
                ]);

            }
            else{

                return response()->json([
                    'status' =>  false,
                    'msg' => 'Not found!'
                ]);
            }

        } else {
            return response()->json([
                'status' => false,
                'msg' => 'unauthenticated!'
            ]);
        }
    }

    public function completeBooking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'booking_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }
        $token = request()->bearerToken();

        $user = User::where('token', $token)->where('user_role', 'customer')->first();

        if ($user) {

            // return $parseDate;
            $booking= ServiceBooking::where('user_id', $user->id)
            ->where('id',$request->booking_id)
            ->with('user', 'provider', 'service', 'service_type.service_type')->first();

            if($booking)
            {
                $booking->status = 'completed';
                $booking->save();

                return response()->json([
                    'status' =>  true,
                    'data' => $booking
                ]);

            }
            else{

                return response()->json([
                    'status' =>  false,
                    'msg' => 'Not found!'
                ]);
            }

        } else {
            return response()->json([
                'status' => false,
                'msg' => 'unauthenticated!'
            ]);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provider_id' => 'required',
            'time_slot' => 'required',
            'date' => 'required',
            'service_id' => 'required',
            'service_type_id' => 'required',
            'platform_fee' => 'required',
            'service_fee' => 'required',
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        try {

            $token = request()->bearerToken();

            $user = User::where('token', $token)->where('user_role', 'customer')->first();

            if ($user) {

                $booking = new ServiceBooking();
                $booking->provider_id = $request->provider_id;
                $booking->user_id = $user->id;
                $booking->service_id = $request->service_id;
                $booking->service_type_id = $request->service_type_id;
                $booking->date = Carbon::parse($request->date);
                $booking->time_slot = $request->time_slot;
                $booking->platform_fee = $request->platform_fee;
                $booking->service_fee = $request->service_fee;
                $booking->total = $request->total;
                $booking->save();

                $booking = ServiceBooking::where('id', $booking->id)->with('user', 'provider', 'service', 'service_type.service_type')->first();

                return response()->json([
                    'status' => true,
                    'data' => $booking
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'unauthenticated!'
                ]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'status' => false,
                'msg' => $th->getMessage()
            ]);
        }
    }
}
