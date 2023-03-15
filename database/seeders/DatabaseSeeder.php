<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*Category::truncate();
          User::truncate();
          Post::truncate();*/

          $user = User::factory()->create(
            [
                'name' => 'Erik',
                'username' => 'erik'
            ]
            );
          Post::factory(5)->create(
            [
            'user_id' => $user->id
            ]
          );

         /* Post::factory(5)->create([
            'title' => 'TITLE'
          ]); vsetko nahodne okrem hentoho */

          

/*
        $user = User::factory()->create();
        //\App\Models\User::factory(1)->create();

        $personal= Category::create([
             'name' => 'Personal',
             'slug' => 'personal'
         ]);
        $work=  Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);
        $family= Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);
        Post::create([
            'user_id' =>$user->id,
            'category_id'=>$family->id,
            'title' => 'My Family Post',
            'slug' => 'my-family-post',
            'excerpt' => 'Excerpt for Family post',
            'body' => 'Body for Family post'
        ]);
        Post::create([
            'user_id' =>$user->id,
            'category_id'=>$work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => 'Excerpt for Work post',
            'body' => 'Body for Work post'
       ]);
       Post::create([
        'user_id' =>$user->id,
        'category_id'=>$personal->id,
        'title' => 'My Personal Post',
        'slug' => 'my-personal-post',
        'excerpt' => 'Excerpt for Personal post',
        'body' => 'Body for Personal post'
       ]);*/
    }
}
