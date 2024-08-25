<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category;

        $validatedData = $request->validate([
            'category' => 'required|min:3'
        ]);

        $category->category_name = $validatedData['category'];

        $category->save();

        flash()->success('New category has been added successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::find($id);

        return view('admin.edit_category', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = Category::find($id);

        $categories->category_name = $request->category;

        $categories->save();

        flash()->success('Category has been updated successfully.');

        return redirect('/add_category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        $category->delete();

        flash()->success('Category has been deleted successfully.');

        return redirect()->back();
    }

    public function viewCategory()
    {
        $no = 1;

        $categories = Category::orderBy('category_name', 'asc')->get();

        return view('admin.view_category', compact('categories', 'no'));
    }
}
