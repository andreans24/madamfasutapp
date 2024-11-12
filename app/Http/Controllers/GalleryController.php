<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('category')->get();
        return view('konten.gallery.index', compact('galleries'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('konten.gallery.create', compact('categories'));
    }

    public  function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
        ]);

        // Ambil data dari request
        $categoryId = $request->input('category_id');
        $title = $request->input('title');
        $category = Category::find($categoryId); // Mendapatkan data kategori terkait

        // Pastikan file gambar ada di request
        if ($request->hasFile('image')) {
            // Ambil file image
            $image = $request->file('image');
            // Buat nama file unik dengan menambahkan timestamp di depan nama file asli
            $imageName = time() . '-' . $image->getClientOriginalName();
            // Tentukan folder gallery sesuai nama kategori, simpan file gambar ke storage
            $imagePath = $image->storeAs("gallery/{$category->name}", $imageName, 'public');
        }


        Gallery::create([
            'category_id' => $category->id,
            'title' => $title,
            'image' => $imagePath,
        ]);
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery created successfully');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $categories = Category::all();

        return view('konten.gallery.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        // Validate the input
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3048',
        ]);

        $category = Category::find($request->category_id);
        $title = $request->title;

        // Handle image upload if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }

            // Store the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs("gallery/{$category->name}", $imageName, 'public');

            // Update image name in the database
            $gallery->image = $imagePath;
        }

        // Update other fields
        $gallery->category_id = $request->category_id;
        $gallery->title = $title;
        $gallery->save();


        return redirect()->route('admin.gallery.index')->with('success', 'Gallery updated successfully');
    }

    // Function to delete a gallery item
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Delete the image from storage if it exists
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        // Delete the gallery item from the database
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery deleted successfully');
    }
}
