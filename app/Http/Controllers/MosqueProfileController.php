<?php

namespace App\Http\Controllers;

use App\Models\MosqueProfile;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use Illuminate\Http\Request;

class MosqueProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mosque = User::all();
        $provinces = Province::all();
        $regencies = Regency::all();
        return view('pages.admin.dashboard',["mosque"=>$mosque,"provinces"=>$provinces,"regencies"=>$regencies]);
          
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
