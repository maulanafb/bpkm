<?php

namespace App\Http\Controllers;

use App\Models\DailyChecklist;
use App\Models\MosqueStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailyChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dailyChecklists = DailyChecklist::all();
        $mosque = Auth::user();
        return view('pages.profile.checklist.daily-checklist', compact('dailyChecklists', 'mosque'));
    }

    public function create()
    {
        return view('daily_checklists.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            // 'stw' => 'required|boolean',
            // 'al_mulk' => 'required|boolean',
            // 'smk' => 'required|boolean',
            // 'odoj' => 'required|boolean',
            'date' => 'required|date',
        ]);

        $data['stw'] = $request->filled('stw');
        $data['al_mulk'] = $request->filled('al_mulk');
        $data['smk'] = $request->filled('smk');
        $data['odoj'] = $request->filled('odoj');
        // dd($data);
        DailyChecklist::create($data);
        notify()->success('Data berhasil ditambah.');
        return redirect()->route('daily-checklists.index')
            ->with('success', 'Daily Checklist created successfully');
    }

    public function edit(DailyChecklist $dailyChecklist)
    {
        return view('daily_checklists.edit', compact('dailyChecklist'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'user_id' => 'required',
            // 'stw' => 'nullable|boolean',
            // 'al_mulk' => 'nullable|boolean',
            // 'smk' => 'nullable|boolean',
            // 'odoj' => 'nullable|boolean',
            'date' => 'nullable|date',
        ]);
        $data['stw'] = $request->filled('stw');
        $data['al_mulk'] = $request->filled('al_mulk');
        $data['smk'] = $request->filled('smk');
        $data['odoj'] = $request->filled('odoj');
        // Menggunakan where untuk menemukan DailyChecklist berdasarkan ID
        // dd($data);
        DailyChecklist::where('id', $id)->update($data);
        notify()->success('Data berhasil diubah.');
        return redirect()->route('daily-checklists.index')
            ->with('success', 'Daily Checklist updated successfully');
    }

    public function destroy($id)
    {
        $dailyChecklist = DailyChecklist::find($id);
        if (!$dailyChecklist) {
            return response()->json(['success' => false]);
        }
        // Lakukan proses penghapusan data di sini, misalnya:
        $dailyChecklist->delete();
        notify()->success('Data berhasil dihapus.');
        return response()->json(['success' => true]);
    }
}

