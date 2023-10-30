<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $mosque = User::all()->first();
       
        return view('pages.profile.dashboard-profile',['mosque'=>$mosque]);
    }
    
}