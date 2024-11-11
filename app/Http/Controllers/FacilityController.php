<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Facility;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();
        $facilities = Facility::with('category', 'gallery')->get();
        return view('konten.facility.index', compact('facilities'));
    }

    public function create()
    {
        $categories = Category::all();
        $galleries = Gallery::all();
        return view('konten.facility.create', compact('categories', 'galleries'));
    }

    public function store(Request $request)
    {
        // Validasi kolom yang wajib diisi
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'gallery_id' => 'required|exists:galleries,id',
            'title' => 'required|string|max:255',
            'fasilitas' => 'nullable|string',
            'panjang' => 'nullable|string',
            'luas' => 'nullable|string',
            'lws' => 'nullable|string',
            'luas_m2' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        // Membuat data fasilitas baru
        Facility::create([
            'category_id' => $validatedData['category_id'],
            'gallery_id' => $validatedData['gallery_id'],
            'title' => $validatedData['title'],
            'fasilitas' => $validatedData['fasilitas'],
            'panjang' => $validatedData['panjang'],
            'luas' => $validatedData['luas'],
            'lws' => $validatedData['lws'],
            'luas_m2' => $validatedData['luas_m2'],
            'keterangan' => $validatedData['keterangan'],
        ]);

        return redirect()->route('admin.facility.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Temukan data facility berdasarkan ID
        $facility = Facility::findOrFail($id);

        // Ambil data kategori dan galeri untuk dropdown
        $categories = Category::all();
        $galleries = Gallery::where('category_id', $facility->category_id)->get(); // Hanya galeri yang sesuai kategori

        return view('konten.facility.edit', compact('facility', 'categories', 'galleries'));
    }

    public function update(Request $request, Facility $facility)
    {
        // Validasi kolom yang wajib diisi
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'gallery_id' => 'required|exists:galleries,id',
            'title' => 'required|string|max:255',
            'fasilitas' => 'nullable|string',
            'panjang' => 'nullable|string',
            'luas' => 'nullable|string',
            'lws' => 'nullable|string',
            'luas_m2' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        // Memperbarui data fasilitas
        $facility->update($validatedData);

        return redirect()->route('admin.facility.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    // Menghapus fasilitas
    public function destroy($id)
    {
        // Cari data fasilitas berdasarkan id
        $facility = Facility::findOrFail($id);
        // Jika data fasilitas tidak ditemukan, kembalikan pesan error
        if (!$facility) {
            return redirect()->route('admin.facility.index')->with('error', 'Data fasilitas tidak ditemukan.');
        }
        // Hapus data fasilitas
        $facility->delete();
        // Redirect ke halaman daftar fasilitas dengan pesan sukses
        return redirect()->route('admin.facility.index')->with('success', 'Data fasilitas berhasil dihapus.');
    }

    public function getGalleriesByCategory($category_id)
    {
        $galleries = Gallery::where('category_id', $category_id)->get();
        return response()->json($galleries);
    }
}
