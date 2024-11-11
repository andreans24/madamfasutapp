<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Bollard;

class BollardController extends Controller
{
    public function index()
    {
        return view('konten.bollard.index');
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
            // 'jumlah' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'gallery_id' => 'required|exists:galleries,id',
        ]);

        Bollard::create([
            'fasilitas' => $request->fasilitas,
            'baik' => $request->baik,
            'rusak' => $request->rusak,
            // 'jumlah' => $request->jumlah,
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
        return view('bollards.edit', compact('bollard', 'categories', 'galleries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fasilitas' => 'required|string|max:255',
            'baik' => 'required|integer',
            'rusak' => 'required|integer',
            // 'jumlah' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'gallery_id' => 'required|exists:galleries,id',
        ]);

        $bollard = Bollard::findOrFail($id);
        $bollard->update([
            'fasilitas' => $request->fasilitas,
            'baik' => $request->baik,
            'rusak' => $request->rusak,
            // 'jumlah' => $request->jumlah,
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
