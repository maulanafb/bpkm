<?php

namespace App\Http\Controllers;

use App\Models\MonthlyChecklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonthlyChecklistController extends Controller
{
    public function index()
    {
        $monthlyChecklists = MonthlyChecklist::where('user_id', auth()->user()->id)->get();
        $mosque = Auth::user();
        return view('pages.profile.checklist.monthly-checklist', compact('monthlyChecklists', 'mosque'));
    }

    public function create()
    {
        return view('monthly_checklists.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            // 'monthly_khatam_quran' => 'nullable|boolean',
            'date' => 'required|date',
        ]);
        $data['monthly_khatam_quran'] = $request->filled('monthly_khatam_quran');

        MonthlyChecklist::create($data);

        notify()->success('Data berhasil ditambah.');
        return redirect()->route('monthly-checklists.index')->with('success', 'Monthly Checklist created successfully');
    }

    public function edit(MonthlyChecklist $monthlyChecklist)
    {
        return view('monthly_checklists.edit', compact('monthlyChecklist'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            // 'monthly_khatam_quran' => 'nullable|boolean',
            'date' => 'required|date',
        ]);

        $data['monthly_khatam_quran'] = $request->filled('monthly_khatam_quran');
        unset($data['user_id']);
        MonthlyChecklist::where('id', $id)->update($data);

        notify()->success('Data berhasil diubah.');
        return redirect()->route('monthly-checklists.index')->with('success', 'Monthly Checklist updated successfully');
    }

    public function destroy($id)
    {
        $monthlyChecklist = MonthlyChecklist::find($id);

        if (!$monthlyChecklist) {
            return response()->json(['success' => false]);
        }

        $monthlyChecklist->delete();

        notify()->success('Data berhasil dihapus.');
        return response()->json(['success' => true]);
    }
}
