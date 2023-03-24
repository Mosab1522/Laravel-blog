<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {

        return view('posts.index', [
            //'posts' =>  Post::latest()->filter(request(['search', 'category', 'author']))->get()
            'posts' =>  Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()

            //
        ]);
    }

    public function show(Post $post,)
    {
        return view('posts.show', ['post' => $post]);
    }

    //request()->user()->can('admin'); pripadne cannot toto odpovie booleanom a potom mozess zavolat error napriklad
    //$this->authorize('admin'); toto je riadna autorizacia kde odpovie 403 ale bez moznosti uprav

    // index ->show all of resource 
    // show -> show one resource ,create-> show a page to create a new item
    // store ->when you submit that form procces the item
    // edit ->show a page to update the item 
    // update -> when you submit that form update the item 
    // destroy -> destroy a item
}
