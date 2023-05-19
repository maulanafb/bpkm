<?php

namespace App\Http\Controllers;

use App\Models\Mosque;
use Illuminate\Http\Request;

class MosqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.profile');
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
    public function show(Mosque $mosque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mosque $mosque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mosque $mosque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mosque $mosque)
    {
        //
    }
}
