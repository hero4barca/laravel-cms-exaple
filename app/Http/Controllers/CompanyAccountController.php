<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyAccountController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:company');
    }

    public function index()
    {
       

        return view('company.company_profile');
        
    }
}
