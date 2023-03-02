<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

//use Faker\Core\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
//use phpDocumentor\Reflection\Types\This;

// prikazy cache('posts.all'); cache()->get('posts.all');  cache()->forget('posts.all');  cache()->put('foo', 'bar'); cache(['foo' => 'bar'], now()->addSeconds(3));
class Post
{
    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        //return File::files( resource_path("posts/");s

        /* $files= File::files(resource_path("posts/"));

        return array_map(function($file){return $file->getContents();},$files);*/
        // Toto by sa malo cacheovat.
        // return cache()->rememberForever('posts.all',function(){
        return collect(File::files(resource_path("posts")))
            ->map(function ($file) {
                return   YamlFrontMatter::parseFile($file);
            })
            ->map(function ($document) {
                //$document = YamlFrontMatter::parseFile($file);

                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                );
            })->sortByDesc('date');
        // }); - pri cache verzi
    }
    public static function find($slug)
    {
        //base_path / resource_path..

        //$path = __DIR__ . "/../resources/posts/{$slug}.html";

        /* $path = resource_path("posts/{$slug}.html");

        if(!file_exists($path)){
            // abort(404);
            return redirect('/');
            throw new ModelNotFoundException();
            
         }*/
        // now()->addDay();..
        // fn()=>.. namiesto function use 
        /*$post = cache()->remember("posts.{$slug}", 5, function () use ($path){ 
             var_dump('file_get_contents',);*/
        //          return file_get_contents($path);//}); 

        return static::all()->firstWhere('slug', $slug);
    }
}
