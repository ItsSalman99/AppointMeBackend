<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpVerification;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'fcm_token' => 'nullable',
            'dob' => 'nullable',
            'address' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        try {

            $credentials = request(['email', 'password']);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->user_role = 'customer';
            $user->fcm_token = $request->fcm_token;
            $user->dob = $request->dob;
            $user->address = $request->address;
            $user->save();

            if (auth()->attempt($credentials)) {

                $auth = Auth::user();
                $token = JWTAuth::fromUser($auth);
                $user->token = $token;
                $user->save();
            }

            return response()->json([
                'status' => true,
                'data' => $user
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'msg' => $th->getMessage()
            ]);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'fcm_token' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }

        try {

            $user = User::where('email', $request->email)->first();

            if ($user) {
                $credentials = ['email' => $request->email, 'password' => $request->password];

                if (Hash::check($request->password, $user->password)) {

                    $auth = Auth::attempt($credentials);
                    if ($auth) {
                        $user->fcm_token = isset($request->fcm_token) ? $request->fcm_token : $user->fcm_token;
                        $user->save();
                        return response()->json([
                            'status' => true,
                            'data' => $user
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => false,
                        'msg' => 'Invalid password!'
                    ]);
                }

                // $auth = Auth::user();
                // $token = JWTAuth::fromUser($auth);
                // $user->token = $token;
                // $user->save();
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'Account does not exists!'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'msg' => $th->getMessage()
            ]);
        }
    }
    
    public function getLogin()
    {
        $token = request()->bearerToken();
        
        try {

            $user = User::where('token', '!=', NULL)->where('token', $token)->first();

            if ($user) {
                return response()->json([
                    'status' => true,
                    'data' => $user
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'unauthenticated!!'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'msg' => $th->getMessage()
            ]);
        }
    }
    
    public function logout()
    {
        $token = request()->bearerToken();
        
        try {

            $user = User::where('token', '!=', NULL)->where('token', $token)->first();

            if ($user) {
                
                $user->fcm_token = NULL;
                $user->save();
                
                return response()->json([
                    'status' => true,
                    'data' => $user
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'unauthenticated!!'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'msg' => $th->getMessage()
            ]);
        }
    }
    
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }
        
        $otp = mt_rand(111111,999999);
        
        $data = [
            'title' => 'Email Verification',
            'body' => 'Please verify your email by using the given below otp',
            'otp' => $otp
        ];
        
        Mail::to($request->email)->send(new OtpVerification($data));
        
        $user = DB::select('select * from password_resets where email = ?', [$request->email]);
        
        if($user)
        {
            DB::table('password_resets')->where('email', $request->email)->delete();
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $otp
            ]);
        }
        else{
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $otp
            ]);
        }
        

        return response()->json([
            'status' => true,
            'msg' => $otp
        ]);
            
        
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
        
        
        $user = DB::table('password_resets')->where('email', $request->email)->first();
        
        if($user)
        {
            if($user->token == $request->otp)
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
        else{
            return response()->json([
                'status' => false,
                'msg' => 'Not Found!'
            ]);   
        }
    }
}
