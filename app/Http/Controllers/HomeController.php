<?php

namespace App\Http\Controllers;

use App\Models\MonthlyFinancialReport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $mosques = User::all()->first();
        $user = Auth::user();
        $allMosque = User::where('verif', true)->get();
        $totalIncome = MonthlyFinancialReport::where('user_id', Auth::user()->id)->sum('income');
        $totalOutcome = MonthlyFinancialReport::where('user_id', Auth::user()->id)->sum('outcome');
        if ($user->hasRole('admin')) {
            $allMosque = User::get();
        } else {
            $allMosque = User::where('verif', true)->get();
        }
        $v1 = Auth::user()->mosque_admin;
        $v2 = Auth::user()->mosque_profile;
        $v3 = Auth::user()->mosque_land;
        $v4 = Auth::user()->mosque_program;
        // $v5 = Auth::user()->;

        if (($v4) == null) {
            return redirect()->route('mosque-profile.show');
        } else {
            return view('pages.dashboard', [
                "mosques" => $mosques,
                "allMosque" => $allMosque,
                'totalIncome' => $totalIncome,
                'totalOutcome' => $totalOutcome
            ]);
        }


    }
}
