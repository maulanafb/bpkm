<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MosqueGallery;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class MosqueGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $auth = Auth::user()->id;


        $mosque = Auth::user();
        $galleries = MosqueGallery::where('user_id', auth()->user()->id)->get();


        return view('pages.profile.dashboard-gallery', compact(['galleries', 'mosque']));
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10000',
        ]);
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('galleries', 'public');
        }
        Auth::user()->galleries()->create($data);
        notify()->success('Foto berhasil ditambah.');
        return redirect()->route('mosque-gallery.index')->with('success', 'Image uploaded successfully');
    }

    public function show(Request $request)
    {
        return view('gallery.show', compact('gallery'));
    }

    public function edit(Request $request)
    {
        return view('gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:10048',
        ]);
        // Ambil galeri berdasarkan ID
        $gallery = MosqueGallery::find($id);
        // Perbarui judul galeri
        $gallery->title = $request->get('title');
        // Perbarui gambar jika ada yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($gallery->image);
            // Simpan gambar yang baru diunggah
            $imagePath = $request->file('image')->store('gallery_images', 'public');
            $gallery->image = $imagePath;
        }
        // Simpan perubahan ke database
        $gallery->save();
        notify()->success('Gallery berhasil diubah.');
        // Redirect dengan pesan sukses jika diperlukan
        return redirect()->route('mosque-gallery.index')->with('success', 'Galeri berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // dd($id);
        // Temukan galeri berdasarkan ID
        $gallery = MosqueGallery::find($id);

        // Periksa apakah galeri ditemukan
        if (!$gallery) {
            return redirect()->route('gallery.index')->with('error', 'Galeri tidak ditemukan');
        }

        // Hapus gambar dari penyimpanan
        Storage::disk('public')->delete($gallery->image);

        // Hapus galeri dari database
        $gallery->delete();
        notify()->success('Foto berhasil dihapus.');
        return redirect()->route('mosque-gallery.index')->with('success', 'Galeri berhasil dihapus');
    }
}
