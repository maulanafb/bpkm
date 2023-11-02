<?php

namespace App\Http\Controllers;

use App\Models\MosqueCondition;
use App\Models\MosqueProgram;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MosqueProgramController extends Controller
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
        return view('pages.mosque-program', [
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
        $data = [
            'user_id' => Auth::user()->id,
            'five_daily_prayer' => $request->input('five_daily_prayer'),
            'jumah_prayer' => $request->input('jumah_prayer'),
            'odoj' => $request->input('odoj'),
            'smk' => $request->input('smk'),
            'praza' => $request->input('praza'),
            'khatam_quran' => $request->input('khatam-quran'),
            'bp_sk' => $request->input('bp_sk'),
            'almulk_am' => $request->input('almulk_am'),
            'happy_neightbor' => $request->input('happy_neightbor'),
            'happy_family' => $request->input('happy_family'),
        ];

        MosqueProgram::create($data);

        return redirect()->route('home');
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
        $user = Auth::user()->mosque_program;

        $mosque = User::all()->first();
        $auth = Auth::user()->id;
        return view('pages.profile.dashboard-programs', [
            'auth' => $auth,
            'mosque' => $mosque,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MosqueCondition $mosqueCondition, $id)
    {
        $data = $request->all();
        $item = MosqueProgram::where('user_id', $id)->firstOrFail();

        $item->update($data);
        notify()->success('Data berhasil diperbarui.');
        return redirect()->route('mosque-program-edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MosqueCondition $mosqueCondition)
    {
        //
    }
}
