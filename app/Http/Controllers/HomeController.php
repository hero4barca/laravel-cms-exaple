<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{    
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
       // redirect to the proper accout based on user role
        if (Auth::check()) {
            

            if ($request->user()->hasRole('admin')){
                return redirect('/admin/dashboard');
            }elseif ($request->user()->hasRole('company')){
                return redirect('/company/profile');
            }elseif ($request->user()->hasRole('employee')){
                return redirect('/employee/profile');
            }else{
                return $this->logout ($request); 
            }

        }
        // 
        return $this->logout ($request);
    }
    
    /**
     * Show the application dashboard.
     * @param request
     * @return redirect to  siteroot
     */
    public function logout(Request $request)
        {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }
}
