<?php


namespace App\Http\Controllers;

use App\Http\Requests\Blog\BlogStoreRequest;
use App\Http\Requests\Blog\BlogUpdateRequest;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class CategoryController extends Controller
{
    public function index(Request $request): View|Factory|Application
    {
        $categories = Category::query()
            ->when($request->has('search'),
                fn($query) => $query->where('name', 'like', '%' . $request->get('search') . '%'))
            ->latest()
            ->paginate(10);

        return view('categories/index', compact('categories'));
    }

    public function create(): View|Factory|Application
    {
        return view('categories/create');
    }

    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        Category::query()->create($request->validated());

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category ): View|Factory|Application
    {
        return view('categories/edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request,Category $category): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function show(Category $category): View|Factory|Application
    {
        $category->loadMissing('blogs');

        return view('categories/show', compact('category'));
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->loadMissing('blogs')->delete();
        $category->delete();


        return redirect()
            ->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}





