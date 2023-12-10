<?php
// app/Http/Controllers/WeeklyChecklistController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WeeklyChecklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeeklyChecklistController extends Controller
{
    public function index(Request $request)
    {
        $weeklyChecklists = WeeklyChecklist::where('user_id', auth()->user()->id);

        // Filter berdasarkan tanggal jika tanggal mulai dan tanggal selesai diberikan
        if ($request->has('start_date')) {
            $start_date = $request->input('start_date');
            $weeklyChecklists->whereDate('date', '>=', $start_date);
        }
        if ($request->has('end_date')) {
            $end_date = $request->input('end_date');
            $weeklyChecklists->whereDate('date', '<=', $end_date);
        }

        $weeklyChecklists = $weeklyChecklists->get();
        $mosque = Auth::user();

        return view('pages.profile.checklist.weekly-checklist', compact('weeklyChecklists', 'mosque'));
    }
    public function show($id, Request $request)
    {
        $weeklyChecklists = WeeklyChecklist::where('user_id', $id);

        // Filter berdasarkan tanggal jika tanggal mulai dan tanggal selesai diberikan
        if ($request->has('start_date')) {
            $start_date = $request->input('start_date');
            $weeklyChecklists->whereDate('date', '>=', $start_date);
        }
        if ($request->has('end_date')) {
            $end_date = $request->input('end_date');
            $weeklyChecklists->whereDate('date', '<=', $end_date);
        }

        $weeklyChecklists = $weeklyChecklists->get();
        $mosqueId = $id;
        $mosque = User::find($id);
        $user = Auth::user();
        return view('pages.details.detail-weekly-checklist', compact('weeklyChecklists', 'mosque', 'mosqueId', 'user'));
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
