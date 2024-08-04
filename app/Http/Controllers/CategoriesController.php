<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(view: 'categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validation
        $validated = $request->validate([
            'name' => 'required|min:2|max:50|unique:categories',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        flash(message: 'Category created successfully')->success();
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Validation
        $validated = $request->validate([
            'name' => 'required|min:2|max:50|unique:categories,name,' .$id,
        ]);

        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->save();

        flash(message: 'Category updated successfully')->info();
        return redirect()->route('categories.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        flash(message: 'Category deleted successfully')->error();
        return redirect()->route('categories.index');
    }
}
