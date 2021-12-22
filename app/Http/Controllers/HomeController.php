<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserLoggedIn;

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
        return view('home');
    }

    /**
     * Utilisateurs en ligne
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */    
    public function onlineusers()
    {
        return view('onlineusers');
    }     

    /**
     * Show the test page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */    
    public function test()
    {
        return view('test');
    }    
}
