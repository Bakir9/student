<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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
        //Every single view
        //View::share('categorys',Category::all());

       /* View::composer(['blog.*', 'news.*'], function($view){
            $view->with('categorys', Category::all()); 
            $view->with('tags', Tag::all());
            $view->with('blogs', Blog::all());
        });*/
    }
}
