<?php

namespace App\Http\Controllers;


use App\Models\Survey;
use Session;
use Illuminate\Support\Facades\Auth;

class SideNavController extends Controller
{

    // For Dashboard
    public function dashboard()
    {
        if (Auth::check()) {
            return view('Mainpage/dashboard');
        }
        return redirect('auth/login');
    }

    // For Survey
    public function survey()
    {
        if (Auth::check()) {
            return view('Mainpage/survey');
        }
        return redirect('auth/login');
    }

    public function createSurvey()
    {
        if (Auth::check()) {
            return view('Mainpage/surveycreate');
        }
        return redirect('auth/login');
    }


    // For Response
    public function response()
    {
        if (Auth::check()) {
            return view('Mainpage/response');
        }
        return redirect('auth/login');
    }

    // For Signout
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('auth/login');
    }
}
