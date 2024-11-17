<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToolsCategory;

class ToolsCategoryController extends Controller
{
    public function index()
    {
        $toolsCategories = ToolsCategory::all();
        return view('settings.equipt.index', compact('toolsCategories'));
    }

    public function create()
    {
        return view('settings.equipt.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peralatan' => 'required|string|max:255',
        ]);

        ToolsCategory::create([
            'nama_peralatan' => $request->nama_peralatan,
        ]);

        return redirect()->route('admin.tools.index')->with('success', 'equipment created successfully');
    }

    public function edit($id)
    {
        $toolsCategories = ToolsCategory::findOrFail($id);
        return view('settings.equipt.edit', compact('toolsCategories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_peralatan' => 'required|string|max:255',
        ]);

        $toolsCategories = ToolsCategory::findOrFail($id);
        $toolsCategories->update([
            'nama_peralatan' => $request->nama_peralatan,
        ]);

        return redirect()->route('admin.tools.index')->with('success', 'equipment successfully Updated!!');
    }

    public function destroy($id)
    {
        $toolsCategories = ToolsCategory::findOrFail($id);
        $toolsCategories->delete();

        return redirect()->route('admin.tools.index')->with('success', 'equipment Successfully Deleted');
    }
}
