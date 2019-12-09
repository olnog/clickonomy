<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
	    return view('home', [
	   	'capital'=>\App\Capital::where('userID', \Auth::id())->first(), 
	   	'labor'=>\App\Labor::where('userID', \Auth::id())->first() 
	    ]);
    }
}
