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
        $user = Auth::user()->mosque_profile;

        $mosque = User::all()->first();
        $provinces = Province::all();
        $regencies = Regency::all();
        return view('pages.profile.dashboard-profile',["mosque"=>$mosque,"provinces"=>$provinces,"regencies"=>$regencies,"auth"=>$auth,"user"=>$user]);
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
            'photo_path' => $request->file('photo_path')->store('assets/mosque', 'public'),
            'problem' => $request['problem'],
            'funding_plan' => $request['funding_plan'],
            'funding_needs' => $request['funding_needs'],
            'building_area' => $request['building_area'],
            'mosque_account_number' => $request['mosque_account_number'],
            'bmi_account_number' => $request['bmi_account_number'],
            'history' => $request['history'],
            'phone_number' => $request['phone_number'],
            'address' => $request['address'],
            'province_id' => $request['province_id'],
            'regency_id' => $request['regencies_id'],
            'coordinator' => $request['coordinator'],
    ];

        MosqueProfile::create($data);

        return redirect()->route('mosque-land');
    }

    /**
     * Display the specified resource.
     */
    public function show(MosqueProfile $mosqueProfile)
    {
        $auth = Auth::user()->id;
        $user = Auth::user()->mosque_profile;

        $mosque = User::all()->first();
        $provinces = Province::all();
        $regencies = Regency::all();
        return view('pages.mosque-profile',["mosque"=>$mosque,"provinces"=>$provinces,"regencies"=>$regencies,"auth"=>$auth,"user"=>$user]);
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
