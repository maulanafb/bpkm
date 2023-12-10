<?php

namespace App\Http\Controllers;

use App\Models\Mosque;
use App\Models\MosqueCaretaker;
use App\Models\MosqueProgram;
use App\Models\Program;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MosqueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $mosque = User::all()->first();
        $provinces = Province::all();
        $regencies = Regency::all();
        return view('pages.profile', ["mosque" => $mosque, "provinces" => $provinces, "regencies" => $regencies]);
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
    public function show($id)
    {
        // $userId = Auth::user()->id;
        $caretaker = MosqueCaretaker::where(['user_id' => $id])->get();
        $programs = MosqueProgram::where(['user_id' => $id])->get();
        $provinces = Province::all();
        $regencies = Regency::all();
        $mosque = User::find($id);
        $mosque_land = $mosque->mosque_land;
        $mosque_coordinator = $mosque->mosque_admin;
        $mosqueId = $id;
        // dd($mosque_condition);
        return view('pages.details.detail-mosque', compact(['mosqueId', 'provinces', 'regencies', 'mosque', 'caretaker', 'programs', 'mosque_land', 'mosque_coordinator']));
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
