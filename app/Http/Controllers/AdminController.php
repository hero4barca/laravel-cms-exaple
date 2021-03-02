<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!request()->user()->hasRole('admin')) {            
            return redirect('/home');
        }

        return view('admin.dashboard');
        
    }
}
