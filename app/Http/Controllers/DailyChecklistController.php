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
        dd($request);
        $data = $request->validate([
            'user_id' => 'required',
            'stw' => 'required|boolean',
            'al_mulk' => 'required|boolean',
            'smk' => 'required|boolean',
            'odoj' => 'required|boolean',
            'date' => 'nullable|date',
        ]);

        DailyChecklist::create($data);

        return redirect()->route('daily-checklist.index')
            ->with('success', 'Daily Checklist created successfully');
    }

    public function edit(DailyChecklist $dailyChecklist)
    {
        return view('daily_checklists.edit', compact('dailyChecklist'));
    }

    public function update(Request $request, DailyChecklist $dailyChecklist)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'stw' => 'required|boolean',
            'al_mulk' => 'required|boolean',
            'smk' => 'required|boolean',
            'odoj' => 'required|boolean',
            'date' => 'nullable|date',
        ]);

        $dailyChecklist->update($data);

        return redirect()->route('daily-checklist.index')
            ->with('success', 'Daily Checklist updated successfully');
    }

    public function destroy(DailyChecklist $dailyChecklist)
    {
        $dailyChecklist->delete();

        return redirect()->route('daily-checklist.index')
            ->with('success', 'Daily Checklist deleted successfully');
    }
}
