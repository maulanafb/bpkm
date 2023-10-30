<?php

namespace App\Http\Controllers;

use App\Models\MosqueAdministratorProfile;
use Illuminate\Http\Request;
use App\Models\MosqueCaretaker; // Sesuaikan dengan nama model yang sesuai
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MosqueCaretakerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user()->mosque_admin;
        $userId = Auth::user()->id;
        $careTaker = MosqueCaretaker::where(['user_id' => $userId])->get();
        // dd($user);
        $coba = MosqueAdministratorProfile::all()->first();

        $mosque = User::all()->first();
        $auth = Auth::user()->id;
        return view('pages.profile.dashboard-caretaker', [
            'auth' => $auth,
            'mosque' => $mosque,
            'user' => $user,
            'careTaker' => $careTaker
        ]);
    }

    public function create()
    {
        // Logika untuk menampilkan form tambah pengurus masjid
    }

    public function store(Request $request)
    {
        // Validasi data dari formulir (tambahkan sesuai kebutuhan Anda)
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            // Tambahkan validasi untuk input lainnya jika diperlukan
        ]);

        // Simpan data pengurus masjid ke dalam database
        // Sertakan user_id yang diambil dari pengguna yang sudah login
        MosqueCaretaker::create([
            'name' => $request->name,
            'role' => $request->role,
            'user_id' => auth()->user()->id,
            // Mengambil ID pengguna yang sudah login
            // Simpan input lainnya sesuai kebutuhan Anda
        ]);

        // Redirect ke halaman yang sesuai setelah menyimpan data
        return redirect()->route('caretaker.index')->with('success', 'Data pengurus masjid berhasil disimpan.');
    }

    public function edit($id)
    {
        // Temukan pengurus masjid berdasarkan ID
        $pengurusMasjid = MosqueCaretaker::find($id);

        // Jika pengurus masjid tidak ditemukan, kembalikan response error atau sesuaikan dengan kebijakan Anda
        if (!$pengurusMasjid) {
            return redirect()->route('pengurus-masjid.index')->with('error', 'Pengurus masjid tidak ditemukan.');
        }

        return view('pengurus_masjid.edit', compact('pengurusMasjid'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data dari formulir (tambahkan sesuai kebutuhan Anda)
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            // Tambahkan validasi untuk input lainnya jika diperlukan
        ]);

        // Temukan pengurus masjid berdasarkan ID
        $pengurusMasjid = MosqueCaretaker::find($id);

        // Jika pengurus masjid tidak ditemukan, kembalikan response error atau sesuaikan dengan kebijakan Anda
        if (!$pengurusMasjid) {
            return redirect()->route('caretaker.index')->with('error', 'Pengurus masjid tidak ditemukan.');
        }

        // Update data pengurus masjid
        $pengurusMasjid->update([
            'name' => $request->name,
            'role' => $request->role,
            // Update input lainnya sesuai kebutuhan Anda
        ]);

        // Redirect ke halaman yang sesuai setelah menyimpan data
        return redirect()->route('caretaker.index')->with('success', 'Data pengurus masjid berhasil diperbarui.');
    }


    public function destroy($id)
    {
        // Temukan pengurus masjid berdasarkan ID
        $pengurusMasjid = MosqueCaretaker::find($id);

        // Jika pengurus masjid tidak ditemukan, kembalikan response error
        if (!$pengurusMasjid) {
            return redirect()->route('caretaker.index')->with('error', 'Pengurus masjid tidak ditemukan.');
        }

        // Hapus pengurus masjid
        $pengurusMasjid->delete();

        // Redirect ke halaman yang sesuai setelah menghapus
        return redirect()->route('caretaker.index')->with('success', 'Pengurus masjid berhasil dihapus.');
    }
}
