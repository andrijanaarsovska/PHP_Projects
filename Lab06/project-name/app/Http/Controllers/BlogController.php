<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Console\Application;
use Illuminate\Http\Request;


use App\Http\Requests\Blog\BlogStoreRequest;
use App\Http\Requests\Blog\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Http\RedirectResponse;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class BlogController extends Controller
{
    public function index(Request $request): View|Factory|\Illuminate\Foundation\Application
    {
        $blogs = Blog::query()
            ->with('blog')
            ->when(
                $request->get('status') !== null,
                fn($query) => $query->where('status', $request->get('status'))
            )
            ->latest()
            ->paginate(10);

        return view('blogs/index', compact('blogs'));
    }

    public function create(): View|Factory|Application
    {
        $categories = Category::query()
            ->get();

        return view('categories/create', compact('categories'));
    }

    public function store(BlogStoreRequest $request): RedirectResponse
    {
        Blog::query()
            ->create($request->validated());

        return redirect()
            ->route('blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blogs): View|Factory|Application
    {
        $categories = Category::query()
            ->get();

        return view('blogs/edit', compact('blogs', 'categories'));
    }

    public function update(BlogUpdateRequest $request, Blog $blog): RedirectResponse
    {
        $blog->update($request->validated());

        return redirect()
            ->route('blogs.index')
            ->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->delete();

        return redirect()
            ->route('blogs.index')
            ->with('success', 'Blog deleted successfully.');
    }

    public function show(Blog $blog): View|Factory|Application
    {
        $blog->loadMissing('category');

        return view('blogs.show', compact('blog'));
    }
}

?>

