<?php

namespace App\Http\Controllers;

use App\Models\MosqueProfile;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

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
        $coba = MosqueProfile::all()->first();

        $mosque = Auth::user();
        $provinces = Province::all();
        $regencies = Regency::all();
        return view('pages.profile.dashboard-profile', ["mosque" => $mosque, "provinces" => $provinces, "regencies" => $regencies, "auth" => $auth, "user" => $user, 'coba' => $coba]);
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
        $request->validate([
            'photo_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:9048',
            // Sesuaikan validasi sesuai kebutuhan Anda
            // Tambahkan validasi untuk field lainnya
        ]);

        $data = $request->all();

        if ($request->hasFile('photo_path')) {
            $data['photo_path'] = $request->file('photo_path')->store('assets/mosque', 'public');
        }
        // Simpan data masjid ke dalam database
        $data['user_id'] = Auth::user()->id;
        MosqueProfile::create($data);
        // dd($data);
        return redirect()->route('mosque-administrator');
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
        return view('pages.mosque-profile', ["mosque" => $mosque, "provinces" => $provinces, "regencies" => $regencies, "auth" => $auth, "user" => $user]);
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
    public function update(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);

        $user = Auth::user()->mosque_profile;
        $item = MosqueProfile::where('user_id', $id);

        if ($request->hasFile('photo_path')) {
            $data['photo_path'] = $request->file('photo_path')->store('assets/mosque', 'public');
        }

        $item->update($data);

        // Tambahkan notifikasi sukses
        notify()->success('Data berhasil diperbarui.');

        return redirect()->route('mosque-profile.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MosqueProfile $mosqueProfile)
    {
        //
    }
}
