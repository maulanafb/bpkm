<?php

namespace App\Http\Controllers;

use App\Models\MonthlyFinancialReport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MonthlyFinancianReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil data keuangan bulanan
        $reports = MonthlyFinancialReport::where('user_id', auth()->user()->id);

        // Filter berdasarkan tanggal jika tanggal mulai dan tanggal selesai diberikan
        if ($request->has('start_date')) {
            $start_date = $request->input('start_date');
            $reports->where('date', '>=', $start_date);
        }
        if ($request->has('end_date')) {
            $end_date = $request->input('end_date');
            $reports->where('date', '<=', $end_date);
        }

        $monthlyReports = $reports->get();
        $totalIncome = $monthlyReports->sum('income');
        $totalOutcome = $monthlyReports->sum('outcome');

        $monthlySummaries = $reports->select(
            DB::raw('DATE_FORMAT(date, "%Y-%m") as month'),
            DB::raw('SUM(income) as total_income'),
            DB::raw('SUM(outcome) as total_outcome'),
        )
            ->groupBy('month')
            ->get();
        $availableYears = MonthlyFinancialReport::select(DB::raw('YEAR(date) as year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->pluck('year');


        // $monthlyReports = Auth::user()->monthly_report;
        // dd($reports->income);
        $mosque = Auth::user();
        $auth = Auth::user()->id;
        return view('pages.finance.finance-monthly-report', compact(['totalOutcome', 'availableYears', 'totalIncome', 'monthlySummaries', 'monthlyReports', 'mosque', 'auth']));
    }

    public function show(Request $request, $id)
    {
        // Ambil data keuangan bulanan
        $reports = MonthlyFinancialReport::where('user_id', $id);

        // Filter berdasarkan tanggal jika tanggal mulai dan tanggal selesai diberikan
        if ($request->has('start_date')) {
            $start_date = $request->input('start_date');
            $reports->where('date', '>=', $start_date);
        }
        if ($request->has('end_date')) {
            $end_date = $request->input('end_date');
            $reports->where('date', '<=', $end_date);
        }

        $monthlyReports = $reports->get();
        $totalIncome = $monthlyReports->sum('income');
        $totalOutcome = $monthlyReports->sum('outcome');

        $monthlySummaries = $reports->select(
            DB::raw('DATE_FORMAT(date, "%Y-%m") as month'),
            DB::raw('SUM(income) as total_income'),
            DB::raw('SUM(outcome) as total_outcome'),
        )
            ->groupBy('month')
            ->get();
        $availableYears = MonthlyFinancialReport::select(DB::raw('YEAR(date) as year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->pluck('year');

        $mosqueId = $id;
        $mosque = Auth::user();
        $auth = Auth::user()->id;
        return view('pages.details.detail-finance-monthly-report', compact(['totalOutcome', 'availableYears', 'totalIncome', 'monthlySummaries', 'mosqueId', 'monthlyReports', 'mosque', 'auth']));
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
            'photo_path' => 'required|file|mimes:jpeg,png,jpg,gif|max:10000',
        ], [
            'photo_path.required' => 'File foto harus diunggah.',
            'photo_path.image' => 'File harus berupa gambar.',
            'photo_path.mimes' => 'File harus berformat JPEG, PNG, JPG, atau GIF.',
            'photo_path.max' => 'Ukuran file maksimal adalah 10MB.',
        ]);

        try {
            $income = preg_replace('/[^\d]/', '', $request->input('income'));
            $outcome = preg_replace('/[^\d]/', '', $request->input('outcome'));

            $data = [
                'user_id' => auth()->user()->id,
                'income' => $income,
                'outcome' => $outcome,
                'date' => $request->input('date'),
            ];

            if ($request->hasFile('photo_path')) {
                $data['photo_path'] = $request->file('photo_path')->store('assets/monthly-report', 'public');
            }

            // Simpan data ke dalam database, misalnya menggunakan model "MonthlyFinancialReport" sebagai contoh
            MonthlyFinancialReport::create($data);
            notify()->success('Data berhasil ditambah.');
            return redirect()->route('monthly-report.index');
        } catch (\Exception $e) {
            // drakify('error')
            dd($e->getMessage());
            notify()->error('Terjadi kesalahan. ' . $e->getMessage());
            return redirect()->route('monthly-report.index');
        }
    }




    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'income' => 'required|numeric',
            'outcome' => 'required|numeric',
            'date' => 'required|date',
            'photo_path' => 'file|mimes:jpeg,png,jpg,gif|max:2800',
        ], [
            'income.required' => 'Pemasukan harus diisi.',
            'income.numeric' => 'Pemasukan harus berupa angka.',
            'outcome.required' => 'Pengeluaran harus diisi.',
            'outcome.numeric' => 'Pengeluaran harus berupa angka.',
            'date.required' => 'Tanggal harus diisi.',
            'date.date' => 'Format tanggal tidak valid.',
            'photo_path.mimes' => 'File harus berformat JPEG, PNG, JPG, atau GIF.',
            'photo_path.max' => 'Ukuran file maksimal adalah 100kb.',
        ]);

        try {
            $item = MonthlyFinancialReport::find($id);

            if (!$item) {
                notify()->error('Data tidak ditemukan.');
                return redirect()->route('monthly-report.index');
            }

            // Update data laporan keuangan
            $income = preg_replace('/[^\d]/', '', $request->input('income'));
            $outcome = preg_replace('/[^\d]/', '', $request->input('outcome'));

            $item->income = $income;
            $item->outcome = $outcome;
            $item->date = $request->input('date');

            if ($request->hasFile('photo_path')) {
                // Hapus gambar lama jika ada
                if (Storage::disk('public')->exists($item->photo_path)) {
                    Storage::disk('public')->delete($item->photo_path);
                }

                // Simpan gambar baru
                $item->photo_path = $request->file('photo_path')->store('assets/monthly-report', 'public');
            }

            $item->save();

            notify()->success('Data berhasil diupdate.');
            return redirect()->route('monthly-report.index');
        } catch (\Exception $e) {
            notify()->error('Terjadi kesalahan. ' . $e->getMessage());
            return redirect()->route('monthly-report.index');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $monthlyReport = MonthlyFinancialReport::find($id);


        if (!$monthlyReport) {
            return response()->json(['success' => false]);
        }

        // Lakukan proses penghapusan data di sini, misalnya:
        $monthlyReport->delete();
        notify()->success('Data berhasil dihapus.');
        return response()->json(['success' => true]);
    }


}
