<?php

namespace App\Http\Controllers;

use App\Models\MosqueLand;
use App\Models\User;
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
        return view('pages.mosque-land', [
            'auth' => $auth
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
        // Validasi input
        $request->validate([
            'land_status' => 'required',
            'land_name' => 'required',
            'total_land_area' => 'required|numeric',
            'building_area' => 'required|numeric',
            'land_document' => 'nullable|file|mimes:pdf',
            'mosque_design' => 'nullable|file|mimes:pdf',
            'mosque_rab' => 'nullable|file|mimes:pdf',
        ]);

        // Tetapkan nilai default untuk file paths
        $shmDocumentPath = null;
        $designDocumentPath = null;
        $rabDocumentPath = null;

        // Periksa apakah file diunggah
        if ($request->hasFile('land_document')) {
            $shmDocumentPath = $request->file('land_document')->store('assets/documents', 'public');
        }

        if ($request->hasFile('mosque_design')) {
            $designDocumentPath = $request->file('mosque_design')->store('assets/documents', 'public');
        }

        if ($request->hasFile('mosque_rab')) {
            $rabDocumentPath = $request->file('mosque_rab')->store('assets/documents', 'public');
        }

        // Simpan data dalam database
        MosqueLand::create([
            'user_id' => Auth::user()->id,
            'land_status' => $request->input('land_status'),
            'land_name' => $request->input('land_name'),
            'total_land_area' => $request->input('total_land_area'),
            'building_area' => $request->input('building_area'),
            'land_document' => $shmDocumentPath,
            'mosque_design' => $designDocumentPath,
            'mosque_rab' => $rabDocumentPath,
            // Kolom lain yang ingin Anda simpan
        ]);

        return redirect()->route('mosque-program');
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
        $user = Auth::user()->mosque_land;
        $coba = MosqueLand::all()->first();
        $statusMapping = [
            1 => 'SHM',
            2 => 'Surat Tanah',
            3 => 'AIW Pribadi',
            4 => 'AIW Atas Nama Yayasan Masjid Kapal Munzalan',
        ];

        $mosque = Auth::user();
        $auth = Auth::user()->id;
        return view('pages.profile.dashboard-land', [
            'auth' => $auth,
            'mosque' => $mosque,
            'user' => $user,
            'statusMapping' => $statusMapping,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'land_status' => 'required',
            'land_name' => 'required',
            'total_land_area' => 'required|numeric',
            'building_area' => 'required|numeric',
            'land_document' => 'nullable|file|mimes:pdf',
            'mosque_design' => 'nullable|file|mimes:pdf',
            'mosque_rab' => 'nullable|file|mimes:pdf',
        ]);

        // Temukan data dengan ID yang diberikan
        $item = MosqueLand::where('user_id', $id)->firstOrFail();

        // Perbarui data yang ada dengan data baru
        $item->update([
            'land_status' => $request->input('land_status'),
            'land_name' => $request->input('land_name'),
            'total_land_area' => $request->input('total_land_area'),
            'building_area' => $request->input('building_area'),
        ]);

        // Periksa dan perbarui file paths jika file diunggah
        if ($request->hasFile('land_document')) {
            $shmDocumentPath = $request->file('land_document')->store('assets/documents', 'public');
            $item->update(['land_document' => $shmDocumentPath]);
        }

        if ($request->hasFile('mosque_design')) {
            $designDocumentPath = $request->file('mosque_design')->store('assets/documents', 'public');
            $item->update(['mosque_design' => $designDocumentPath]);
        }

        if ($request->hasFile('mosque_rab')) {
            $rabDocumentPath = $request->file('mosque_rab')->store('assets/documents', 'public');
            $item->update(['mosque_rab' => $rabDocumentPath]);
        }
        notify()->success('Data berhasil diperbarui.');
        return redirect()->route('mosque-land-edit', $id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MosqueLand $mosqueLand)
    {
        //
    }
}
