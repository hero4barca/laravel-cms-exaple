<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeAccountController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:employee');
    }

    public function index()
    {
       

        return view('employee.employee_profile');
        
    }
}
