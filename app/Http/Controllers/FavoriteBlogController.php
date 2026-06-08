<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class FavoriteBlogController extends Controller
{
    // SHOW FAVORITES PAGE
    public function index()
    {
        $favoriteBlogs = auth()->user()
            ->favoriteBlogs()
            ->latest()
            ->paginate(10);

        return view('blogs.favorite', [
            'favoriteBlogs' => $favoriteBlogs
        ]);
    }

    // ADD FAVORITE
    public function store(Blog $blog)
    {
        auth()->user()
            ->favoriteBlogs()
            ->syncWithoutDetaching([$blog->id]);

        return back();
    }

    // REMOVE FAVORITE
    public function destroy(Blog $blog)
    {
        auth()->user()
            ->favoriteBlogs()
            ->detach($blog->id);

        return back();
    }
}
