<?php

namespace App\Http\Controllers;

use App\Models\MosqueAdministratorProfile;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MosqueAdministratorProfileController extends Controller
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
        return view('pages.mosque-administrator',[
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
            'coordinator_name' => $request['coordinator_name'],
            'phone_number' => $request['phone_number'],
            'coordinator_status' => $request['coordinator_status'],
            'other_position' => $request['other_position'],
            'director_name' => $request['director_name'],
    ];

        MosqueAdministratorProfile::create($data);

        return redirect()->route('mosque-document.index');
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
        $user = Auth::user()->mosque_admin;
        // dd($user);
        $coba = MosqueAdministratorProfile::all()->first();

        $mosque = User::all()->first();
        $auth = Auth::user()->id;
        return view('pages.profile.dashboard-administrator',[
            'auth'=>$auth,
            'mosque'=>$mosque,
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MosqueAdministratorProfile $mosqueAdministratorProfile,$id)
    {
        $data = $request->all();
        $item = MosqueAdministratorProfile::findOrFail($id);
        $item->update($data);

        return redirect()->route('dashboard-administrator-edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MosqueAdministratorProfile $mosqueAdministratorProfile)
    {
        //
    }
}
