<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CustomerAddress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function addAddress(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'street_address' => 'required',
            'house' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        $token = $request->bearerToken();

        try {

            $user = User::where('token', '!=', NULL)->where('token', $token)
            ->where('user_role', 'customer')->first();

            if ($user) {
                
                $check = CustomerAddress::where('user_id', $user->id)->first();
                
                if($check)
                {
                    $check->first_name = $request->first_name;
                    $check->last_name = $request->last_name;
                    $check->street_address = $request->street_address;
                    $check->house = $request->house;
                    $check->country = $request->country;
                    $check->state = $request->state;
                    $check->zip_code = $request->zip_code;
                    $check->save();
                }
                else{
                    
                    $address = new CustomerAddress();
    
                    $address->user_id = $user->id;
                    $address->first_name = $request->first_name;
                    $address->last_name = $request->last_name;
                    $address->street_address = $request->street_address;
                    $address->house = $request->house;
                    $address->country = $request->country;
                    $address->state = $request->state;
                    $address->zip_code = $request->zip_code;
                    $address->save();
                
                    
                }
                    


                $user = User::where('id', $user->id)
                    ->with('customer_addresses')->first();

                return response()->json([
                    'status' => true,
                    'data' => $user
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'unauthenticated!'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'msg' => $th->getMessage()
            ]);
        }
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        $token = $request->bearerToken();

        try {

            $user = User::where('token', '!=', NULL)->where('token', $token)
                ->where('user_role', 'customer')->first();

            if ($user) {

                if(Hash::check($request->current_password, $user->password))
                {
                    $user->password = Hash::make($request->password);
                    $user->save();
    
                    $user = User::where('id', $user->id)
                        ->with('customer_addresses')->first();
    
                    return response()->json([
                        'status' => true,
                        'data' => $user
                    ]);
                    
                }
                else{
                    return response()->json([
                        'status' => false,
                        'msg' => 'Password does not matched!!'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'unauthenticated!'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'msg' => $th->getMessage()
            ]);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'dob' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        $token = $request->bearerToken();

        try {

            $user = User::where('token', '!=', NULL)->where('token', $token)
                ->where('user_role', 'customer')->first();

            if ($user) {


                $user->name = isset($request->name) ? $request->name : $user->name;
                $user->dob = isset($request->dob) ? $request->dob : $user->dob;
                $user->save();

                $user = User::where('id', $user->id)
                    ->with('customer_addresses')->first();

                return response()->json([
                    'status' => true,
                    'data' => $user
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'unauthenticated!'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'msg' => $th->getMessage()
            ]);
        }
    }

}
