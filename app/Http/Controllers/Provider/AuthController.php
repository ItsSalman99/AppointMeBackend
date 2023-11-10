<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\BusinessSector;
use App\Models\BusinessSubSector;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->guard = "web"; // add
    }
    
    public function login()
    {
        return view('auth.login');
    }
    
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        
        if($validator->fails())
        {
            return response()->json([
                'status' => false,
                'msg' => $validator->errors()->first()
            ]);
        }
        
        $user = User::where('email', $request->email)->where('user_role', 'provider')->first();
        
        if($user && $user->user_role == 'provider')
        {
            if(Hash::check($request->password, $user->password))
            {
                 $credentials = [
                    'email' => $request->email,
                    'password' => $request->password,
                ];
                
                
                
                $auth = auth()->attempt($credentials);
                // dd($auth);
                
                if($auth)
                {
                    return response()->json([
                        'status' => true,
                        'msg' => 'Logged in successful!'
                    ]);
                    
                }
                else{
                    return response()->json([
                        'status' => false,
                        'msg' => 'Something went wrong!'
                    ]);
                }
                
            }
            else{
                return response()->json([
                    'status' => false,
                    'msg' => 'Wrong password!'
                ]);
            }
            

            
        }
        else{
            return response()->json([
                'status' => false,
                'msg' => 'Invalid Account!'
            ]);
        }
        
    }
    
    public function logout()
    {
        Auth::logout();
        
        return redirect()->route('login');
    }
    
    public function register()
    {
        // dd(session()->get('provider'));
        return view('auth.register');
    }
    
    public function registerStep2()
    {
        $business_sectiors = BusinessSector::all();
        
        // dd(session()->get('provider'));
        return view('auth.register-step2', get_defined_vars());
    }
    
    public function getSubSectors($id)
    {
        $sub_sectiors = BusinessSubSector::where('sector_id', $id)->get();
        
        return response()->json([
            'status' => true,
            'data' => $sub_sectiors
        ]);
        
    }
    
    public function registerStep3()
    {
        // dd(session()->get('provider'));
        return view('auth.register-step3');
    }
    
    public function registerUserSession(Request $request)
    {
        $provider = session()->get('provider');
        
        if(isset($provider) && $provider != null)
        {
            $user = [
                'first_name' => isset($request->first_name) ? $request->first_name : $provider['first_name'],
                'last_name' => isset($request->last_name) ? $request->last_name : $provider['last_name'],
                'email' => isset($request->email) ? $request->email : $provider['email'],
                'phone' => isset($request->phone) ? $request->phone : $provider['phone'],
                'dob' => isset($request->dob) ? $request->dob : $provider['dob'],
                'business_name' => isset($request->business_name) ? $request->business_name : $provider['business_name'],
                'business_sub_sector' => isset($request->business_sub_sector) ? $request->business_sub_sector : $provider['business_sub_sector'],
                'address' => isset($request->address) ? $request->address : $provider['address'],
                'password' => isset($request->password) ? $request->password : $provider['password'],
            ];
            
        }
        else{
            $user = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'dob' => $request->dob,
                'business_name' => $request->business_name,
                'business_sub_sector' => $request->business_sub_sector,
                'address' => $request->address,
                'password' => $request->password
            ];
        }
        
        if($request->is_submit == 1)
        {
            
            $user = new User();
            $user->name =  $provider['first_name'] . ' '. $provider['last_name'];
            $user->email =  $provider['email'];
            $user->phone =  $provider['phone'];
            $user->business_name =  $provider['business_name'];
            $user->password =  Hash::make($request->password);
            $user->user_role = 'provider';
            $user->sub_sector_id = $provider['business_sub_sector'];
            $user->dob = $provider['dob'];
            $user->address = $provider['address'];
            $user->save();
            
            $credentials = [
                'email' => $provider['email'],
                'password' => $request['password'],
            ];
            
            Auth::attempt($credentials);
        
            session()->put('provider', null);
               
            return true;   
            // return redirect()->route('dashboard');
        }
        
        session()->put('provider', $user);
        
        return true;
        
    }
    
    public function registerStore(Request $request)
    {
        $provider = session()->get('provider');

        $user = new User();
        $user->name =  $provider['first_name'] . ' '. $provider['last_name'];
        $user->email =  $provider['email'];
        $user->phone =  $provider['phone'];
        $user->business_name =  $provider['business_name'];
        $user->password =  Hash::make($provider['password']);
        $user->save();
        
        return redirect()->route('dashboard');
        
    }
    
    
}
