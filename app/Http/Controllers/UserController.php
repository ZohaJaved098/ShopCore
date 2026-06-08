<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user()->load('blogs.favoritedBy');

        return view('user.profile', compact('user'));
    }
    public function dashboard()
    {

        $productsCount = Product::count();
        $blogsCount = Blog::count();
        $usersCount = User::count();
        $managersCount = User::whereHas('roles', function ($q) {
            $q->where('name', 'manager');
        })->count();
        return view('dashboard.index', ['users' => $usersCount, 'products' => $productsCount, 'blogs' => $blogsCount, 'managers' => $managersCount]);
    }
    public function productsDashboard()
    {
        $products = Product::get();
        return view('dashboard.products', ['allProducts' => $products]);
    }
    public function blogsDashboard()
    {
        $blogs = Blog::get();
        return view('dashboard.blogs', ['allBlogs' => $blogs]);
    }
    public function usersDashboard()
    {
        $users = User::get();
        return view('dashboard.users', ['allUsers' => $users]);
    }
    public function makeManager(User $user)
    {
        $managerRole = Role::where('name', 'manager')->first();

        $user->roles()->sync([$managerRole->id]);

        return back();
    }

    public function makeUser(User $user)
    {
        $userRole = Role::where('name', 'user')->first();

        $user->roles()->sync([$userRole->id]);

        return back();
    }
    public function update()
    {
        $user = Auth::user();

        $validated = request()->validate([
            'bio' => ['nullable', 'string', 'max:500'],
            'profile_pic' => ['nullable', 'image', 'max:2048'],
        ]);

        if (request()->hasFile('profile_pic')) {

            if ($user->profile_pic) {
                Storage::disk('public')->delete($user->profile_pic);
            }

            $validated['profile_pic'] = request()
                ->file('profile_pic')
                ->store('profiles', 'public');
        }

        $user->update($validated);

        return back();
    }
    public function delete()
    {
        auth()->user()->delete();
        return redirect('/');
    }
}
