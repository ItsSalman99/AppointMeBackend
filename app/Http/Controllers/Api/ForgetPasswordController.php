<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpVerification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends Controller
{
    
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }   
        
        
        
        $user = User::where('email', $request->email)->first();
        
        if($user)
        {
            
            $otp = mt_rand(111111,999999);
            
            $data = [
                'title' => 'Forget Password Otp',
                'body' => 'You can use this given otp to change your password',
                'otp' => $otp
            ];
            
            Mail::to($request->email)->send(new OtpVerification($data));
            
            $user->otp = $otp;
            $user->save();
            
            return response()->json([
                'status' => true,
                'msg' => $otp
            ]);
            
        }
        else
        {
            return response()->json([
                'status' => false,
                'msg' => 'Account on this email not found!'
            ]);
        }
        
    }
    
    public function checkOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'otp' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }   
        
        
        
        $user = User::where('email', $request->email)->first();
        
        if($user)
        {
            
            if($user->otp == $request->otp)
            {
                return response()->json([
                    'status' => true,
                    'data' => 'Otp matched!'
                ]);
            }
            else{
                 return response()->json([
                    'status' => false,
                    'msg' => 'Invalid Otp!'
                ]);
            }    
            
        }
        else
        {
            return response()->json([
                'status' => false,
                'msg' => 'Account on this email not found!'
            ]);
        }
        
    }
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }
        
        $user = User::where('email', $request->email)->first();
        
        if($user)
        {
            $user->password = Hash::make($request->password);
            $user->save();
            
            return response()->json([
                'status' => true,
                'data' => $user
            ]);
            
        }
        else{
            return response()->json([
                'status' => false,
                'msg' => 'Not Found!'
            ]);
        }
    }
    
}
