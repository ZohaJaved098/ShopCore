<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('email', 'zohajaved.098@gmail.com')->first();
        $tags = Tag::all();
        Blog::insert([
            [
                'title' => 'Getting Started with Laravel',
                'content' => 'Laravel is a powerful PHP framework for building modern web applications...',
                'featured' => true,
                'header_image' => '/seed-images/blogs/laravel.jpg',
                'user_id' => $admin->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Modern UI Design Principles',
                'content' => 'Good UI design is about clarity, spacing, and hierarchy...',
                'featured' => false,
                'header_image' => '/seed-images/blogs/design.jpg',
                'user_id' => $admin->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Why Clean Code Matters',
                'content' => 'Clean code improves readability, maintainability, and team productivity...',
                'featured' => false,
                'header_image' => '/seed-images/blogs/code.jpg',
                'user_id' => $admin->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        $blogs = Blog::where('user_id', $admin->id)->get();

        foreach ($blogs as $blog) {
            $blog->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
