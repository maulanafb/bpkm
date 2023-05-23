<?php

namespace App\Http\Controllers;

use App\Models\MosqueCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MosqueConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = Auth::user()->id;
        return view('pages.mosque-condition',[
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
            'development_status' => $request['development_status'],
            'director_house_status' => $request['director_house_status'],
            'odoj_status' => $request['odoj_status'],
            'quran_house_status' => $request['quran_house_status'],
            'business_entity_status' => $request['business_entity_status'],
            'bmi_status' => $request['bmi_status'],
    ];
        
        MosqueCondition::create($data);

        return redirect()->route('mosque-administrator');
    }

    /**
     * Display the specified resource.
     */
    public function show(MosqueCondition $mosqueCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MosqueCondition $mosqueCondition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MosqueCondition $mosqueCondition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MosqueCondition $mosqueCondition)
    {
        //
    }
}
