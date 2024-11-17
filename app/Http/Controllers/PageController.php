<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Facility;
use App\Models\Fender;
use App\Models\Bollard;

class PageController extends Controller
{
    public function home()
    {
        $galleries = Gallery::all();
        $categories = Category::with('galleries')->get();
        // dd($categories);
        return view('page.home', compact('categories', 'galleries'));
    }

    public function home2($category_id, $gallery_id)
    {

        $category = Category::find($category_id);

        if (!$category) {
            return redirect()->route('page-home1')->with('error', 'Kategori tidak ditemukan.');
        }

        // GALLERY
        $gallery = $category->galleries()->find($gallery_id);

        if (!$gallery) {
            return redirect()->route('page-home1')->with('error', 'Galeri tidak ditemukan.');
        }

        // FACILITY
        $facilities = Facility::where('category_id', $category_id)
            ->where('gallery_id', $gallery_id)
            ->get();

        $totalPanjang = $facilities->sum(function ($facility) {
            return is_numeric($facility->panjang) ? $facility->panjang : 0;
        });
        // FENDER
        $fenders = Fender::where('category_id', $category_id)
            ->where('gallery_id', $gallery_id)
            ->get();

        // Menghitung total baik dan rusak
        $totalBaik = $fenders->sum('baik');
        $totalRusak = $fenders->sum('rusak');
        $totalJumlah = $totalBaik + $totalRusak;
        $jumlah = $fenders->sum(function ($fender) {
            return $fender->baik + $fender->rusak;
        });


        // BOLLARD
        $bollards = Bollard::where('category_id', $category_id)
            ->where('gallery_id', $gallery_id)
            ->get();

        $totalBaik = $bollards->sum('baik');
        $totalRusak = $bollards->sum('rusak');
        $totalJumlah = $totalBaik + $totalRusak;
        $jumlah = $bollards->sum(function ($bollards) {
            return $bollards->baik + $bollards->rusak;
        });

        // Mengirimkan data kategori dan galeri ke view
        return view('page.home2', compact(
            'category',
            'gallery',
            'facilities',
            'fenders',
            'totalPanjang',
            'totalBaik',
            'totalRusak',
            'jumlah',
            'bollards'
        ));
    }

    public function home3()
    {
        return view('page.home3');
    }

    public function getGalleriesByCategory($categoryId)
    {
        // Ambil semua gallery berdasarkan category_id
        $galleries = Gallery::where('category_id', $categoryId)
            ->select('latitude', 'longitude', 'id') // Pilih kolom yang diperlukan
            ->get();
        return response()->json($galleries);
    }
}
