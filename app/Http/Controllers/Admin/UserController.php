<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function providers()
    {
        $providers = User::where('user_role', 'provider')->get();

        return view('admin.users.providers', get_defined_vars());

    }

    public function customers()
    {
        $customers = User::where('user_role', 'customer')->get();

        return view('admin.users.customers', get_defined_vars());

    }
    
    public function showCustomers($id)
    {
        $customer = User::where('id', $id)->first();

        return view('admin.users.customer-details', get_defined_vars());

    }

}
