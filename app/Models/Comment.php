<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

   // protected $guarder = [];

    public function post() // laravel si mysli ze je to post_id
    {
        return $this->belongsTo(Post::class);
    }

    public function author() // laravel si mysli ze je to author_id preto tam je specifikovany atribut
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
