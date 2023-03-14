<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =['title', 'excerpt', 'body' ];

    public function category()
    {
        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }
   /* public function getRouteKeyName()
    {
        return 'slug';
    }*/

    // protected $guarded =['id']; toto nemoze ovplyvnit 3. moznost je 
}
