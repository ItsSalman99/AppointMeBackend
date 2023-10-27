<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
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
            'email' => 'required',
            'password' => 'required'
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
}
