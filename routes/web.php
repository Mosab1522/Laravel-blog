<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', [PostController::class,'index']
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
    //$posts = Post::latest()->get();
   
        // return view('posts', ['posts' => Post::latest()->without(['author'])->get()
   
    /*$posts= Post::all();
  // ddd($posts);
   return view('posts', ['posts' => $posts]);*/
);

Route::get('posts/{post:slug}', [PostController::class, 'show']);

/*Route::get('categories/{category:slug}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');*/

/*Route::get('authors/{author:username}', function (User $author) {

    return view('posts.index', [
        'posts' => $author->posts,
    ]);
});*/
//whereAlpha('post');
//whereAlphaNumeric('post');
//whereNumeric('post');

// Route::get('register', [RegisterController::class,'create'])->middleware('guest');
// Route::post('register', [RegisterController::class,'store'])->middleware('guest');

// Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Route::get('login', [SessionsController::class,'create'])->middleware('guest');
// Route::post('sessions', [SessionsController::class,'store'])->middleware('guest');


Route::post('posts/{post:slug}/comments', [PostCommentsController::class,'store']);

// Route::post('admin/posts',[AdminPostController::class,'store'])->middleware('admin'); // ('can:admin') je uplne rovnake a vtedy mozem vymazat aj cely middleware kedze je nepotrebny
// Route::get('admin/posts/create',[AdminPostController::class,'create'])->middleware('admin');
// Route::get('admin/posts',[AdminPostController::class,'index'])->middleware('admin');
// Route::get('admin/posts/{post}/edit',[AdminPostController::class,'edit'])->middleware('admin');
// Route::patch('admin/posts/{post}',[AdminPostController::class,'update'])->middleware('admin');
// Route::delete('admin/posts/{post}',[AdminPostController::class,'destroy'])->middleware('admin');


Route::middleware('can:admin')->group(function () {
    Route::post('admin/posts',[AdminPostController::class,'store']); 
    Route::get('admin/posts/create',[AdminPostController::class,'create']);
    Route::get('admin/posts',[AdminPostController::class,'index']);
    Route::get('admin/posts/{post}/edit',[AdminPostController::class,'edit']);
    Route::patch('admin/posts/{post}',[AdminPostController::class,'update']);
    Route::delete('admin/posts/{post}',[AdminPostController::class,'destroy']);
});

//Route::resource('admin/posts', AdminPostController::class)->except('show')->middleware('admin'); Vsetky 7 okrem show

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

