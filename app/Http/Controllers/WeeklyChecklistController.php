<?php
// app/Http/Controllers/WeeklyChecklistController.php

namespace App\Http\Controllers;

use App\Models\WeeklyChecklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeeklyChecklistController extends Controller
{
    public function index()
    {
        $weeklyChecklists = WeeklyChecklist::where('user_id', auth()->user()->id)->get();
        // dd($weeklyChecklists);
        $mosque = Auth::user();
        return view('pages.profile.checklist.weekly-checklist', compact('weeklyChecklists', 'mosque'));
    }
    public function create()
    {
        return view('weekly_checklists.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            // 'praza' => 'required|boolean',
            // 'jumah_prayer' => 'required|boolean',
            // 'bp_sk' => 'required|boolean',
            // 'happy_family' => 'required|boolean',
            // 'happy_neighbour' => 'required|boolean',
            'date' => 'required|date',
        ]);
        $data['praza'] = $request->filled('praza');
        $data['jumah_prayer'] = $request->filled('jumah_prayer');
        $data['bp_sk'] = $request->filled('bp_sk');
        $data['happy_family'] = $request->filled('happy_family');
        $data['happy_neighbour'] = $request->filled('happy_neighbour');
        WeeklyChecklist::create($data);
        notify()->success('Data berhasil ditambah.');
        return redirect()->route('weekly-checklists.index')
            ->with('success', 'Weekly Checklist created successfully');
    }

    public function edit(WeeklyChecklist $weeklyChecklist)
    {
        return view('weekly_checklists.edit', compact('weeklyChecklist'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            // 'user_id' => 'required',
            // 'praza' => 'required|boolean',
            // 'jumah_prayer' => 'required|boolean',
            // 'bp_sk' => 'required|boolean',
            // 'happy_family' => 'required|boolean',
            // 'happy_neighbour' => 'required|boolean',
            'date' => 'required|date',
        ]);
        $data['praza'] = $request->filled('praza');
        $data['jumah_prayer'] = $request->filled('jumah_prayer');
        $data['bp_sk'] = $request->filled('bp_sk');
        $data['happy_family'] = $request->filled('happy_family');
        $data['happy_neighbour'] = $request->filled('happy_neighbour');
        unset($data['user_id']);
        WeeklyChecklist::where('id', $id)->update($data);
        notify()->success('Data berhasil diubah.');
        return redirect()->route('weekly-checklists.index')
            ->with('success', 'Weekly Checklist updated successfully');
    }

    public function destroy($id)
    {
        $weeklyChecklist = WeeklyChecklist::find($id);
        if (!$weeklyChecklist) {
            return response()->json(['success' => false]);
        }

        $weeklyChecklist->delete();
        notify()->success('Data berhasil dihapus.');
        return response()->json(['success' => true]);
    }
}
