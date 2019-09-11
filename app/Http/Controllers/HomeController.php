<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts.home');
    }

    public function profile()
    {
        if( Auth::User()->role ==0||Auth::User()->role == 2||Auth::User()->role ==3 )
            return view('layouts.admin,md,mtl-profile');

        elseif( Auth::User()->role ==1||Auth::User()->role ==4 )
            return view('layouts.customer,mts-profile');

        else
            return redirect('layouts.home');
    }
}
