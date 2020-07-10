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
        /*View::share('categorys',Poll::where('isActive',2)
            ->orWhere(function($query) {
                $query->whereDate('start_at',Carbon::now());
        })->first());*/

       /* View::composer(['blog.*', 'news.*'], function($view){
            $view->with('tags', Tag::all());
            $view->with('blogs', Blog::all());
        });*/
    }
}
