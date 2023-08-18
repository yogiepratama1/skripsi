<?php

namespace App\Providers;

use App\Observers\PostObserver;
use App\Models\{Category, Post};
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::all();
        View::composer('*', function ($view) use ($categories) {
            $view->with('categories', $categories);
        });
        
        Post::observe(PostObserver::class);
    }
}
