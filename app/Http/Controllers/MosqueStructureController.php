<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MosqueStructure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MosqueStructureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mosque = Auth::user();
        $structures = MosqueStructure::where('user_id', auth()->user()->id)->get();

        return view('pages.profile.dashboard-structure', compact(['structures', 'mosque']));
    }

    public function create()
    {
        return view('pages.profile.mosque-structures.create');
    }



    public function store(Request $request)
    {
        try {
            // $request->validate([
            //     'name' => 'required',
            //     'position' => 'required',
            //     'photo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10000',
            // ]);

            $data = [
                'name' => $request->name,
                'position' => $request->position,
                'user_id' => Auth::user()->id,
            ];

            if ($request->hasFile('photo_path')) {
                $data['photo_path'] = $request->file('photo_path')->store('mosque_structures', 'public');
            }

            MosqueStructure::create($data);
            notify()->success('Struktur berhasil ditambah.');

            return redirect()->route('mosque-structure.index')->with('success', 'Structure added successfully');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Handle other types of exceptions if needed
            notify()->error('Terjadi kesalahan. Silakan coba lagi.');
            return redirect()->back();
        }
    }




    public function show(MosqueStructure $structure)
    {
        return view('pages.profile.mosque-structures.show', compact('structure'));
    }

    public function edit(MosqueStructure $structure)
    {
        return view('pages.profile.mosque-structures.edit', compact('structure'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'photo_path' => 'image|mimes:jpeg,png,jpg,gif,webp|max:10000',
        ]);

        // Ambil struktur masjid berdasarkan ID
        $structure = MosqueStructure::find($id);

        // Perbarui data struktur masjid
        $structure->name = $request->get('name');
        $structure->position = $request->get('position');

        // Perbarui foto jika ada yang diunggah
        if ($request->hasFile('photo_path')) {
            // Hapus foto lama
            Storage::disk('public')->delete($structure->photo_path);

            // Simpan foto yang baru diunggah
            $photoPath = $request->file('photo_path')->store('mosque_structures', 'public');
            $structure->photo_path = $photoPath;
        }

        // Simpan perubahan ke database
        $structure->save();

        // Redirect dengan pesan sukses jika diperlukan
        return redirect()->route('mosque-structure.index')->with('success', 'Struktur berhasil diperbarui!');
    }


    public function destroy($id)
    {
        try {
            // Temukan struktur masjid berdasarkan ID
            $structure = MosqueStructure::find($id);

            // Periksa apakah struktur masjid ditemukan
            if (!$structure) {
                return redirect()->route('mosque-structure.index')->with('error', 'Struktur Masjid tidak ditemukan');
            }

            // Hapus foto dari penyimpanan
            Storage::disk('public')->delete($structure->photo_path);

            // Hapus struktur masjid dari database
            $structure->delete();

            // Tampilkan notifikasi bahwa struktur berhasil dihapus
            notify()->success('Struktur Masjid berhasil dihapus.');

            return redirect()->route('mosque-structure.index');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect()->route('mosque-structure.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
