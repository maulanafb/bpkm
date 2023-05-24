<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
        $mosques = User::all()->first();
        
        $v1 = Auth::user()->mosque_admin;
        $v2 = Auth::user()->mosque_profile;
        $v3 = Auth::user()->mosque_land;
        $v4 = Auth::user()->mosque_document;
        $v5 = Auth::user()->mosque_condition;
        
        
        if( ($v4) == null){
            return redirect()->route('mosque-profile');
        }else{
            return view('pages.dashboard',["mosques"=>$mosques]);
        }
        
        
    }
}
