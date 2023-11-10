<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function index()
    {
        // dd(Auth::user());
        
        if(Auth::user())
        {
            return view('provider.index');
            
        }
        abort(404);
    }
    
    public function calendar()
    {
        // dd(Auth::user());
        
        return view('provider.calendar');
        
        
    }
    
    public function clients()
    {
        // dd(Auth::user());
        
        return view('provider.clients');
    }
    
    public function inbox()
    {
        // dd(Auth::user());
        
        return view('provider.inbox');
    }
    
}
