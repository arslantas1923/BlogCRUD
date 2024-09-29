<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = Post::where('category_id', $category->id)->get(); // Kategoriye ait yazılar
    
        return view('categories.show', compact('category', 'posts'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
