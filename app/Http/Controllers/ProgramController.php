<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    // app/Http/Controllers/ProgramController.php

    public function index()
    {
        $user = Auth::user()->mosque_admin;
        $userId = Auth::user()->id;

        $mosque = User::all()->first();
        $programs = Program::where(['user_id' => $userId])->get();
        return view('pages.profile.dashboard-programs', compact(['programs', 'mosque']));
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
    {
        $program = new Program;
        $program->nama = $request->input('nama');
        $program->deskripsi = $request->input('deskripsi');
        $program->user_id = auth()->user()->id;
        $program->save();
        return redirect()->route('dashboard-mosque-programs.index');
    }

    public function edit($id)
    {
        $program = Program::find($id);
        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $program = Program::find($id);
        $program->nama = $request->input('nama');
        $program->deskripsi = $request->input('deskripsi');
        $program->save();
        return redirect()->route('dashboard-mosque-programs.index');
    }

    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();
        return redirect()->route('dashboard-mosque-programs.index');
    }

}