<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteViewController extends Controller
{
    
    public function registrationView()
    {
         if (Auth::check() && Auth::user()->role === 'admin')
             return redirect()->route('Admindashboard');

        return view('admins/registration');
    }

    public function loginView()
    {
        // if (Auth::check())
        //     return redirect()->route('Admindashboard');

        return view('login');
    }
}
