<?php

namespace App\Http\Controllers;

use App\Models\MosqueProfile;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MosqueProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user()->id;
        $mosque = User::all()->first();
        $provinces = Province::all();
        $regencies = Regency::all();
        return view('pages.mosque-profile',["mosque"=>$mosque,"provinces"=>$provinces,"regencies"=>$regencies,"auth"=>$auth]);
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
      
        $data = [
            'user_id'=> Auth::user()->id,
            'problem' => $request['problem'],
            'funding_plan' => $request['funding_plan'],
            'funding_needs' => $request['funding_needs'],
            'building_area' => $request['building_area'],
            'mosque_account_number' => $request['mosque_account_number'],
            'bmi_account_number' => $request['bmi_account_number'],
            'history' => $request['history'],
    ];
        
        MosqueProfile::create($data);

        return redirect()->route('mosque-land');
    }

    /**
     * Display the specified resource.
     */
    public function show(MosqueProfile $mosqueProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MosqueProfile $mosqueProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MosqueProfile $mosqueProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MosqueProfile $mosqueProfile)
    {
        //
    }
}
