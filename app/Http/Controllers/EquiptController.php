<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipt;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\ToolsCategory;

class EquiptController extends Controller
{
    public function index()
    {
        $equipts = Equipt::with(['category', 'gallery', 'toolsCategory'])->get();

        return view('konten.equipt_facility.index', compact('equipts'));
    }

    public function create()
    {
        $categories = Category::all();
        $galleries = Gallery::all();
        $toolsCategories = ToolsCategory::all();

        return view('konten.equipt_facility.create', compact('categories', 'galleries', 'toolsCategories'));
    }
}
