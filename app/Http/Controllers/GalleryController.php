<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Category;

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
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $categoryId = $request->input('category_id');
        $title = $request->input('title');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $category = Category::find($categoryId);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName();

            // Pindahkan gambar ke dalam folder public/gallery/{nama_kategori}
            $imagePath = "gallery/{$category->name}/{$imageName}";
            $image->move(public_path("gallery/{$category->name}"), $imageName); // Simpan gambar di folder public
        }

        Gallery::create([
            'category_id' => $category->id,
            'title' => $title,
            'image' => $imagePath,
            'latitude' => $latitude,   // Menyimpan latitude
            'longitude' => $longitude,
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
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $category = Category::find($request->category_id);
        $title = $request->title;
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        if ($request->hasFile('image')) {
            if ($gallery->image) {
                $oldImagePath = public_path($gallery->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Hapus gambar lama dari folder public
                }
            }

            $image = $request->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $imagePath = "gallery/{$category->name}/{$imageName}";
            $image->move(public_path("gallery/{$category->name}"), $imageName); // Simpan gambar di folder public

            $gallery->image = $imagePath;
        }

        // Update other fields
        $gallery->category_id = $request->category_id;
        $gallery->title = $title;
        $gallery->latitude = $latitude;   // Update latitude
        $gallery->longitude = $longitude; // Update longitude
        $gallery->save();


        return redirect()->route('admin.gallery.index')->with('success', 'Gallery updated successfully');
    }

    // Function to delete a gallery item
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image) {
            $imagePath = public_path($gallery->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Hapus file gambar
            }
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery deleted successfully');
    }
}
