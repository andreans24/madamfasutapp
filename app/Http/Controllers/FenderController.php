<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fender;
use App\Models\Gallery;
use App\Models\Category;

class FenderController extends Controller
{
    public function index()
    {
        $fenders = Fender::with('category', 'gallery')->get();
        return view('konten.fender.index', compact('fenders'));
    }

    public function create()
    {
        $categories = Category::all();
        $galleries = Gallery::all();
        return view('konten.fender.create', compact('categories', 'galleries'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'gallery_id' => 'required|exists:galleries,id',
            'fasilitas' => 'nullable|string',
            'baik' => 'nullable|integer',
            'rusak' => 'nullable|integer',
            // 'jumlah' => 'nullable|integer',
        ]);

        // Simpan data ke database
        Fender::create([
            'category_id' => $validatedData['category_id'],
            'gallery_id' => $validatedData['gallery_id'],
            'fasilitas' => $validatedData['fasilitas'],
            'baik' => $validatedData['baik'],
            'rusak' => $validatedData['rusak'],
            // 'jumlah' => $validatedData['jumlah'],
        ]);

        return redirect()->route('admin.fender.index')->with('success', 'Fender berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $fender = Fender::findOrFail($id);
        $categories = Category::all();
        $galleries = Gallery::where('category_id', $fender->category_id)->get();

        return view('admin.fender.edit', compact('fender', 'categories', 'galleries'));
    }

    // Memperbarui data
    public function update(Request $request, $id)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'gallery_id' => 'required|exists:galleries,id',
            'fasilitas' => 'nullable|string',
            'baik' => 'nullable|integer',
            'rusak' => 'nullable|integer',
            // 'jumlah' => 'nullable|integer',
        ]);

        $fender = Fender::findOrFail($id);
        $fender->update($validatedData);

        return redirect()->route('admin.fender.index')->with('success', 'Fender berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy($id)
    {
        $fender = Fender::findOrFail($id);
        $fender->delete();

        return redirect()->route('admin.fender.index')->with('success', 'Fender berhasil dihapus.');
    }


    // Mengambil galleries berdasarkan category_id untuk dropdown dynamic
    public function getGalleriesByCategory($categoryId)
    {
        $galleries = Gallery::where('category_id', $categoryId)->get();
        return response()->json($galleries);
    }
}
