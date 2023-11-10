<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.admin.login');
    }

    public function authenticate(Request $request)
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

        $user = User::where('email', $request->email)->where('user_role', 'admin')->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $credentials = [
                    'email' => $request->email,
                    'password' => $request->password,
                ];



                $auth = auth()->attempt($credentials);
                // dd($auth);

                if ($auth) {
                    return response()->json([
                        'status' => true,
                        'msg' => 'Logged in successful!'
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'msg' => 'Something went wrong!'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'Wrong password!'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Invalid Account!'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login');
    }
}
