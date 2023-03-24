<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(){
        if ($this->app->environment() !== 'production') {
          $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        // ...
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      Model::unguard();

      Gate::define('admin',function(User $user){
        return $user->username == 'erik_pal';
      });

      Blade::if('admin',function(){
          return request()->user()?->can('admin'); // nie dobre ak neni prihlaseny pouzivatel lebo tam bude null bez toho otaznika.. s ? je to optional
      });
       // Paginator::useBootstrap();
    }
}
