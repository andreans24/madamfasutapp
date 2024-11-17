<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Bollard;

class BollardController extends Controller
{
    public function index(Request $request)
    {
        $galleries = Gallery::all();
        $categories = Category::all();
        $bollards = Bollard::with('category', 'gallery')->get();
        $categoryId = $request->get('category_id');
        if ($categoryId) {
            // Filter galleries berdasarkan kategori
            $galleries = Gallery::where('category_id', $categoryId)->get();
        } else {
            // Jika tidak ada filter, tampilkan semua galleries
            $galleries = Gallery::all();
        }

        return view('konten.bollard.index', compact('bollards', 'galleries', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $galleries = Gallery::all();
        return view('konten.bollard.create', compact('categories', 'galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fasilitas' => 'required|string|max:255',
            'baik' => 'required|integer',
            'rusak' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'gallery_id' => 'required|exists:galleries,id',
        ]);

        Bollard::create([
            'fasilitas' => $request->fasilitas,
            'baik' => $request->baik,
            'rusak' => $request->rusak,
            'category_id' => $request->category_id,
            'gallery_id' => $request->gallery_id,
        ]);

        return redirect()->route('admin.bollard.index')->with('success', 'Bollard berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $bollard = Bollard::findOrFail($id);
        $categories = Category::all();
        $galleries = Gallery::all();

        return view('konten.bollard.edit', compact('bollard', 'categories', 'galleries'));
    }

    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        $bollards = Bollard::where('gallery_id', $id)->get();

        return view('konten.bollard.show', compact('gallery', 'bollards'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fasilitas' => 'required|string|max:255',
            'baik' => 'required|integer',
            'rusak' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'gallery_id' => 'required|exists:galleries,id',
        ]);

        $bollard = Bollard::findOrFail($id);
        $bollard->update([
            'fasilitas' => $request->fasilitas,
            'baik' => $request->baik,
            'rusak' => $request->rusak,
            'category_id' => $request->category_id,
            'gallery_id' => $request->gallery_id,
        ]);

        return redirect()->route('admin.bollard.index')->with('success', 'Bollard berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $bollard = Bollard::findOrFail($id);
        $bollard->delete();

        return redirect()->route('admin.bollard.index')->with('success', 'Bollard berhasil dihapus.');
    }

    public function getGalleriesByCategory($categoryId)
    {
        $galleries = Gallery::where('category_id', $categoryId)->get();
        return response()->json($galleries);
    }
}
