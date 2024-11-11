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
        $categories = Category::with('galleries')->get();
        // dd($categories);
        return view('page.home', compact('categories'));
    }

    public function home2($category_id, $gallery_id)
    {
        // Mencari kategori berdasarkan category_id
        $category = Category::find($category_id);

        // Jika kategori tidak ditemukan, redirect kembali ke halaman pertama
        if (!$category) {
            return redirect()->route('page-home1')->with('error', 'Kategori tidak ditemukan.');
        }

        // Mencari galeri berdasarkan gallery_id dalam kategori yang ditemukan
        $gallery = $category->galleries()->find($gallery_id);

        // Jika galeri tidak ditemukan, redirect kembali ke halaman pertama
        if (!$gallery) {
            return redirect()->route('page-home1')->with('error', 'Galeri tidak ditemukan.');
        }

        // Mengambil data fasilitas yang terkait dengan category_id dan gallery_id
        $facilities = Facility::where('category_id', $category_id)
            ->where('gallery_id', $gallery_id)
            ->get();

        $totalPanjang = $facilities->sum(function ($facility) {
            return is_numeric($facility->panjang) ? $facility->panjang : 0;
        });

        // Mengambil data Fender terkait dengan category_id dan gallery_id
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

        // Mengambil data Bollard terkait dengan category_id dan gallery_id
        $bollards = Bollard::where('category_id', $category_id)
            ->where('gallery_id', $gallery_id)
            ->get();

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
        ));
    }

    public function home3()
    {
        return view('page.home3');
    }
}
