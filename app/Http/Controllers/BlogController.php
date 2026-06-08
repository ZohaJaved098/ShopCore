<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function featured()
    {
        $blogs = Blog::where('featured', 1)->paginate(10);
        $products = Product::where('featured', 1)->paginate(10);
        return view('home', ['featuredBlog' => $blogs, 'featuredProduct' => $products]);
    }

    //index
    public function index()
    {
        $blogs = Blog::with('author')->latest()->paginate(5);
        return view('blogs.index', ["blogs" => $blogs]);
    }
    // create
    public function create()
    {
        Gate::authorize('create-blog');

        $tags = Tag::all();
        return view('blogs.create', ['tags' => $tags]);
    }
    // store
    public function show(Blog $blog)
    {
        return view('blogs.show', ["blog" => $blog]);
    }
    public function store()
    {
        // gate used
        Gate::authorize('create-blog');
        // 1. Validation
        request()->validate([
            'title' => ['required', 'min:5', 'max:100'],
            'content' => ['required'],
            'header_image' => [
                'nullable',
                'image',
                'mimes:jpg,png',
                'max:2048'
            ],
            'tags' => ['nullable', 'string'],
        ]);

        // 2. Handle image
        $path = null;

        if (request()->hasFile('header_image')) {
            $path = request()->file('header_image')->store('blogs', 'public');
        }

        // 3. Create blog
        $newBlog = Blog::create([
            'title' => request('title'),
            'content' => request('content'),
            'featured' => request()->has('featured'),
            'header_image' => $path,
            'user_id' => auth()->id(),
        ]);

        // 4. Process tags
        $tagIds = [];

        if (request('tags')) {

            $tags = explode(',', request('tags'));

            foreach ($tags as $tag) {

                $name = strtolower(trim($tag));

                if (!$name)
                    continue;

                // create if not exists
                $tagModel = Tag::firstOrCreate([
                    'name' => $name
                ]);

                $tagIds[] = $tagModel->id;
            }
        }

        // 5. Attach tags (STORE = attach)
        if (!empty($tagIds)) {
            $newBlog->tags()->attach($tagIds);
        }
        // $newBlog->author()->associate(auth()->id());
        // $newBlog->save();

        return redirect('/blogs');
    }
    // show
    // edit
    public function edit(Blog $blog)
    {
        // policy used
        $this->authorize('update', $blog);
        $tags = Tag::all();
        return view('blogs.edit', ["blog" => $blog, 'tags' => $tags]);
    }
    // update
    public function update(Blog $blog)
    {
        // policy used
        $this->authorize('update', $blog);
        request()->validate([
            'title' => ['required', 'min:5', 'max:100'],
            'content' => ['required'],
            'header_image' => [
                'nullable',
                'image',
                'mimes:jpg,png',
                'max:2048'
            ],
            'tags' => ['nullable', 'string'],

        ]);

        $path = $blog->header_image;

        if (request()->hasFile('header_image')) {

            if ($blog->header_image) {
                Storage::disk('public')->delete($blog->header_image);
            }

            $path = request()->file('header_image')->store('blogs', 'public');
        }

        $blog->update([
            'title' => request('title'),
            'content' => request('content'),
            'featured' => request()->has('featured'),
            'header_image' => $path,
        ]);

        // TAGS
        $tagIds = [];

        $tags = request('tags') ? explode(',', request('tags')) : [];

        foreach ($tags as $tag) {

            $name = strtolower(trim($tag));

            if (!$name)
                continue;

            $tagModel = Tag::firstOrCreate([
                'name' => $name
            ]);

            $tagIds[] = $tagModel->id;
        }

        $blog->tags()->sync($tagIds);


        return redirect('/blogs/' . $blog->id);
    }
    // destroy
    public function destroy(Blog $blog)
    {
        // policy used
        $this->authorize('delete', $blog);
        $blog->delete();
        return redirect('/blogs');
    }
    public function authors()
    {
        $authors = User::whereHas('blogs')
            ->whereHas('roles', function ($query) {
                $query->whereIn('name', ['blogger', 'admin']);
            })
            ->with('blogs')
            ->latest()
            ->get();

        return view('blogs.authors', [
            'authors' => $authors
        ]);
    }
}
