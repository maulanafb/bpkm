<?php

namespace App\Http\Controllers;

use App\Models\MosqueLand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MosqueLandController extends Controller
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
        $auth = Auth::user()->id;
        return view('pages.mosque-land',[
            'auth'=>$auth
        ]);
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
            'land_status' => $request['land_status'],
            'land_name' => $request['land_name'],
            'development_process' => $request['development_process'],
            'current_state_development' => $request['current_state_development'],
            'total_land_area' => $request['total_land_area'],
            'building_area' => $request['building_area'],
            'history' => $request['history'],
    ];

        MosqueLand::create($data);

        return redirect()->route('mosque-condition');
    }

    /**
     * Display the specified resource.
     */
    public function show(MosqueLand $mosqueLand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MosqueLand $mosqueLand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MosqueLand $mosqueLand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MosqueLand $mosqueLand)
    {
        //
    }
}
