<?php

namespace App\Http\Controllers;

use App\Models\cr;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $mosque = User::all()->first();
        $provinces = Province::all();
        $regencies = Regency::all();
        $coba = Auth::user();
        return view('pages.test',['coba'=>$coba,"mosques"=>$mosque,"provinces"=>$provinces,"regencies"=>$regencies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

}
