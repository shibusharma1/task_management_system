<?php

namespace App\Http\Controllers;

use App\Models\TaskCategory;
use Illuminate\Http\Request;

class TaskCategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');

        $categories = TaskCategory::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('description', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.tasks.task-categories', compact('categories', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:task_categories,name',
            'description' => 'nullable|string',
        ]);

        TaskCategory::create($request->only('name', 'description'));

        return redirect()->route('task.category')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, TaskCategory $category)
    {
        $request->validate([
            'name' => 'required|max:100|unique:task_categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $category->update($request->only('name', 'description'));

        return redirect()->route('task.category')->with('success', 'Category updated successfully.');
    }

    public function destroy(TaskCategory $category)
    {
        $category->delete();

        return redirect()->route('task.category')->with('success', 'Category deleted successfully.');
    }
}
