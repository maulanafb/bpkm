<?php

namespace App\Http\Controllers;

use App\Models\MonthlyChecklist;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonthlyChecklistController extends Controller
{
    public function index(Request $request)
    {
        $monthlyChecklists = MonthlyChecklist::where('user_id', auth()->user()->id);

        // Filter berdasarkan tanggal jika tanggal mulai dan tanggal selesai diberikan
        if ($request->has('start_date')) {
            $start_date = $request->input('start_date');
            $monthlyChecklists->whereDate('date', '>=', $start_date);
        }
        if ($request->has('end_date')) {
            $end_date = $request->input('end_date');
            $monthlyChecklists->whereDate('date', '<=', $end_date);
        }

        $monthlyChecklists = $monthlyChecklists->get();
        $mosque = Auth::user();

        return view('pages.profile.checklist.monthly-checklist', compact('monthlyChecklists', 'mosque'));
    }
    public function show($id, Request $request)
    {
        // Ambil data daily checklist berdasarkan $id (user_id)
        $checklists = MonthlyChecklist::where('user_id', $id);

        // Filter berdasarkan tanggal jika tanggal mulai dan tanggal selesai diberikan
        if ($request->has('start_date')) {
            $start_date = $request->input('start_date');
            $checklists->whereDate('date', '>=', $start_date);
        }
        if ($request->has('end_date')) {
            $end_date = $request->input('end_date');
            $checklists->whereDate('date', '<=', $end_date);
        }

        $monthlyChecklists = $checklists->get();
        $user = Auth::user();
        $mosqueId = $id;
        $mosque = User::find($id);

        return view('pages.details.detail-monthly-checklist', compact('monthlyChecklists', 'mosque', 'mosqueId', 'user'));
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
