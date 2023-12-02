<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //  for ($i=0; $i < 20 ; $i++) { 
        //     DB::table('posts')->insert([
        //         'title'=> fake()->name(),
        //         'excerpt'=>fake()->text(10),
        //         'body'=>fake()->text()
        //       ]);
        //  }

        // $posts->each(function ($post) {
        //     post::insert($post);
        // });

        Post::factory(10)->create();
    }
}