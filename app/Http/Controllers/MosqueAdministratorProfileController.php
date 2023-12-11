<?php

namespace App\Http\Controllers;

use App\Models\MosqueAdministratorProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MosqueAdministratorProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $auth = Auth::user()->id;
        $user = Auth::user()->mosque_admin;
        return view('pages.mosque-administrator', [
            'auth' => $auth,
            'user' => $user
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'manager_name' => $request['manager_name'],
            'phone_number' => $request['phone_number'],
            'manager_status' => $request['manager_status'],
            'other_position' => $request['other_position'],
        ];
        if ($request->hasFile('photo_path')) {
            $data['photo_path'] = $request->file('photo_path')->store('assets/mosque', 'public');
        }
        MosqueAdministratorProfile::create($data);

        return redirect()->route('mosque-land');
    }

    public function show($id)
    {
        $auth = Auth::user()->id;
        $user = MosqueAdministratorProfile::where('user_id', $id)->first();
        // dd($user);
        $mosque = Auth::user();
        $mosqueId = $id;
        return view('pages.details.detail-administrator', [
            'auth' => $auth,
            'user' => $user,
            'mosqueId' => $mosqueId,
            'mosque' => $mosque
        ]);
    }

    public function edit()
    {
        $user = Auth::user()->mosque_admin;
        $mosque = Auth::user();
        $auth = Auth::user()->id;
        return view('pages.profile.dashboard-administrator', [
            'auth' => $auth,
            'mosque' => $mosque,
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = MosqueAdministratorProfile::where('user_id', $id)->first();
        if ($request->hasFile('photo_path')) {
            $data['photo_path'] = $request->file('photo_path')->store('assets/mosque', 'public');
        }

        $item->update($data);

        return redirect()->route('dashboard-administrator-edit');
    }

    public function destroy(MosqueAdministratorProfile $mosqueAdministratorProfile)
    {
        //
    }
}
