<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory(7)->create();
        $tags = Tag::factory(8)->create();


        Blog::factory(10)->create()->each(function ($blog) use ($tags, $user) {
            // attach random tags
            $blog->tags()->attach(
                $tags->random(3)->pluck('id')
            );

        });

        Product::factory(10)->create();
    }
}
