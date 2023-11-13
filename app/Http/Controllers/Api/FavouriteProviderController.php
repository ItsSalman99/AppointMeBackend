<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CustomerFavouriteProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FavouriteProviderController extends Controller
{

    public function getAll()
    {
        $token = request()->bearerToken();


        $user = User::where('token', '!=', NULL)->where('token', $token)
            ->where('user_role', 'customer')->first();


        if ($user) {
            $favourites = CustomerFavouriteProvider::where('user_id', $user->id)->with('provider')->get();

            return response()->json([
                'status' => true,
                'data' => $favourites
            ]);
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

                $check = User::where('id', $request->provider_id)->where('user_role', 'provider')->first();

                if (!$check) {
                    return response()->json([
                        'status' => false,
                        'msg' => 'Invalid Provider ID!'
                    ]);
                }

                $favourite = new CustomerFavouriteProvider();
                $favourite->user_id = $user->id;
                $favourite->provider_id = $request->provider_id;
                $favourite->save();

                $favourite = CustomerFavouriteProvider::where('id', $favourite->id)->with('provider')->first();

                return response()->json([
                    'status' => true,
                    'data' => $favourite
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
