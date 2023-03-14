<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    /*DB::listen(function($query){
        logger($query->sql);        kuknut kolko query sa vykonalo 
    });*/
  //  $files = File::files(resource_path("posts"));
    /* $posts=[];

    foreach( $files as $file ){
        $document = YamlFrontMatter::parseFile($file);
        $posts[] = new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        );
    }
    $posts = array_map(function ($file) {
        $document = YamlFrontMatter::parseFile($file);

        return new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        );
    }, $files);*/

   // $posts = Post::all();

    return view('posts', ['posts' => Post::with('category')->get()]);
    /*$posts= Post::all();
  // ddd($posts);
   return view('posts', ['posts' => $posts]);*/
});

Route::get('posts/{post:slug}', function (Post $post) {
    // $id alebo Post $post a dole namiesto Post::findorfail - $post
    // Najst post pomocou slug a dat to do view post

    return view('post', ['post' => $post]);
    /*

    return view('post', [
        'post' => $post
    ]);  */
});

Route::get('categories/{category:slug}', function(Category $category){
    
    return view('posts', ['posts' => $category->posts]);
});
//whereAlpha('post');
//whereAlphaNumeric('post');
//whereNumeric('post');
