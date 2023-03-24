<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Queue;

class Post extends Model
{
    use HasFactory;

   // protected $fillable = ['title', 'excerpt', 'body'];

    protected $with = ['category', 'author'];

    

    public function scopeFilter($query, array $filters) //Post::newQuery()->scopeFilter() XX namiesto toho staci filter() 
    {
        /* $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%');
        });*/

        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where(fn ($query) =>
            $query->where('title', 'like', '%' . $search . '%')->orWhere('body', 'like', '%' . $search . '%'))
        );

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            /*$query->whereExists(fn($query)=>
                $query->from('categories')->where('categories.id', 3)->where('categories.slug', $category)
            )*/
            $query->whereHas(
                'category',
                fn ($query) =>
                $query->where('slug', $category)
            )
        );

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            /*$query->whereExists(fn($query)=>
                $query->from('categories')->where('categories.id', 3)->where('categories.slug', $category)
            )*/
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)
            )
        );


        /*if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')->orWhere('body', 'like', '%' . request('search') . '%');
        }*/
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id');
    }

    /* public function getRouteKeyName()
    {
        return 'slug';
    }*/

    // protected $guarded =['id']; toto nemoze ovplyvnit 3. moznost je 
}
