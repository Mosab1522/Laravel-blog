<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable //implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /*protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];*/
    //protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
   

   /* public function getUsernameAttribute($username) //accesor 
    {
        return ucwords($username); //$jane->username vzdy ked chces ziskat z databazy bude velke prve pismeno
    }*/

   /* public function setPasswordAttribute($password) //muttator cokolvek dojde ako set password tak sa nahradi tymto - moze tam byt aj mnou nastavene heslo
    {
        $this->attributes['password'] = bcrypt($password);
    }*/

    public function posts()
    {
            return $this->hasMany(Post::class);
    }

    public function comments()
    {
            return $this->hasMany(Comment::class);
    }
}
