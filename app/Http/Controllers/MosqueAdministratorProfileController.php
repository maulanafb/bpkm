<?php

namespace App\Http\Controllers;

use App\Models\MosqueAdministratorProfile;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use Illuminate\Http\Request;

class MosqueAdministratorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mosque = User::all();
        $provinces = Province::all();
        $regencies = Regency::all();
        return view('pages.profile',["mosque"=>$mosque,"provinces"=>$provinces,"regencies"=>$regencies]);
    
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
    public function show(MosqueAdministratorProfile $mosqueAdministratorProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MosqueAdministratorProfile $mosqueAdministratorProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MosqueAdministratorProfile $mosqueAdministratorProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MosqueAdministratorProfile $mosqueAdministratorProfile)
    {
        //
    }
}
