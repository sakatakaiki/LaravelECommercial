<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'nullable|string'
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được thêm.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $id,
            'description' => 'nullable|string'
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->except(['_token', '_method', 'category_id']));


        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được cập nhật.');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        try {
            $category->delete();
            return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Check for foreign key constraint violation
            if ($e->getCode() == '23000') {
                return redirect()->route('admin.categories.index')
                    ->with('error', 'Cannot delete category because it is associated with existing products.');
            }

            // Other unexpected database errors
            return redirect()->route('admin.categories.index')
                ->with('error', 'An error occurred while deleting the category.');
        }
    }

}
