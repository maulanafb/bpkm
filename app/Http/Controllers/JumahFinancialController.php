<?php

namespace App\Http\Controllers;

use App\Models\JumahFinancialreport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JumahFinancialController extends Controller
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
        $reports = JumahFinancialreport::where('user_id', auth()->user()->id);

        // Filter berdasarkan tanggal jika tanggal mulai dan tanggal selesai diberikan
        if ($request->has('start_date')) {
            $start_date = $request->input('start_date');
            $reports->where('date', '>=', $start_date);
        }
        if ($request->has('end_date')) {
            $end_date = $request->input('end_date');
            $reports->where('date', '<=', $end_date);
        }

        $jumahReports = $reports->get();
        $totalIncome = $jumahReports->sum('income');

        $monthlySummaries = $reports->select(
            DB::raw('DATE_FORMAT(date, "%Y-%m") as month'),
            DB::raw('SUM(income) as total_income')
        )
            ->groupBy('month')
            ->get();

        // $jumahReports = Auth::user()->monthly_report;
        // dd($reports->income);
        $availableYears = JumahFinancialreport::select(DB::raw('YEAR(date) as year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->pluck('year');
        $mosque = Auth::user();
        $auth = Auth::user()->id;
        return view('pages.finance.jumah-report', compact(['availableYears', 'totalIncome', 'monthlySummaries', 'jumahReports', 'mosque', 'auth']));
    }
    public function show(Request $request, $id)
    {
        // Ambil data keuangan bulanan
        $reports = JumahFinancialreport::where('user_id', $id);

        // Filter berdasarkan tanggal jika tanggal mulai dan tanggal selesai diberikan
        if ($request->has('start_date')) {
            $start_date = $request->input('start_date');
            $reports->where('date', '>=', $start_date);
        }
        if ($request->has('end_date')) {
            $end_date = $request->input('end_date');
            $reports->where('date', '<=', $end_date);
        }

        $jumahReports = $reports->get();
        $totalIncome = $jumahReports->sum('income');

        $monthlySummaries = $reports->select(
            DB::raw('DATE_FORMAT(date, "%Y-%m") as month'),
            DB::raw('SUM(income) as total_income')
        )
            ->groupBy('month')
            ->get();
        $availableYears = JumahFinancialreport::select(DB::raw('YEAR(date) as year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->pluck('year');
        $mosqueId = $id;
        $mosque = Auth::user();
        $auth = Auth::user()->id;
        return view('pages.details.detail-jumah-report', compact(['availableYears', 'monthlySummaries', 'totalIncome', 'mosqueId', 'jumahReports', 'mosque', 'auth']));
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
            'income' => 'required',
            // Validasi income harus angka (numeric) dan lebih besar atau sama dengan 0
            // Validasi outcome harus angka (numeric) dan lebih besar atau sama dengan 0
            'date' => 'required|date',
        ], [
            'income.required' => 'Pemasukan harus diisi.',
            'date.required' => 'Tanggal harus diisi.',
            'date.date' => 'Format tanggal tidak valid.',
        ]);

        try {
            $income = preg_replace('/[^\d]/', '', $request->input('income'));
            $data = [
                'user_id' => auth()->user()->id,
                'income' => $income,
                'date' => $request->input('date'),
            ];
            // Simpan data ke dalam database, misalnya menggunakan model "JumahFiancialReport" sebagai contoh
            JumahFinancialreport::create($data);
            notify()->success('Data berhasil ditambah.');
            return redirect()->route('jumah-report.index');
        } catch (\Exception $e) {
            // drakify('error')
            dd($e->getMessage());
            notify()->error('Terjadi kesalahan. ' . $e->getMessage());
            return redirect()->route('jumah-report.index');
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
        // $request->validate([
        //     'income' => 'required|numeric',
        //     'outcome' => 'required|numeric',
        //     'date' => 'required|date',
        //     'photo_path' => 'file|mimes:jpeg,png,jpg,gif|max:2800',
        // ], [
        //     'income.required' => 'Pemasukan harus diisi.',
        //     'income.numeric' => 'Pemasukan harus berupa angka.',
        //     'outcome.required' => 'Pengeluaran harus diisi.',
        //     'outcome.numeric' => 'Pengeluaran harus berupa angka.',
        //     'date.required' => 'Tanggal harus diisi.',
        //     'date.date' => 'Format tanggal tidak valid.',
        //     'photo_path.mimes' => 'File harus berformat JPEG, PNG, JPG, atau GIF.',
        //     'photo_path.max' => 'Ukuran file maksimal adalah 100kb.',
        // ]);

        try {
            $item = JumahFinancialreport::find($id);

            if (!$item) {
                notify()->error('Data tidak ditemukan.');
                return redirect()->route('jumah-report.index');
            }

            // Update data laporan keuangan
            $income = preg_replace('/[^\d]/', '', $request->input('income'));


            $item->income = $income;

            $item->date = $request->input('date');



            $item->save();

            notify()->success('Data berhasil diupdate.');
            return redirect()->route('jumah-report.index');
        } catch (\Exception $e) {
            notify()->error('Terjadi kesalahan. ' . $e->getMessage());
            return redirect()->route('jumah-report.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jumahReport = JumahFinancialreport::find($id);
        if (!$jumahReport) {
            return response()->json(['success' => false]);
        }

        // Lakukan proses penghapusan data di sini, misalnya:
        $jumahReport->delete();
        notify()->success('Data berhasil dihapus.');
        return response()->json(['success' => true]);
    }
}
