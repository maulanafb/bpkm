<?php

namespace App\Http\Controllers;

use App\Models\MosqueStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonthlyChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mosque = Auth::user();
        $structures = MosqueStructure::where('user_id', auth()->user()->id)->get();

        return view('pages.profile.checklist.monthly-checklist', compact(['structures', 'mosque']));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
