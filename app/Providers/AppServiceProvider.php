<?php

namespace App\Providers;

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
        $this->app->bind('App\Repositories\Product\ProductRepositoryInterface', 'App\Repositories\Product\ProductMysqlRepository');

        $this->app->bind('App\Repositories\Blog\BlogRepositoryInterface', 'App\Repositories\Blog\BlogMysqlRepository');

        $this->app->bind('App\Repositories\Word\WordRepositoryInterface', 'App\Repositories\Word\WordMysqlRepository');

        $this->app->bind('App\Repositories\Pronounce\PronounceRepositoryInterface', 'App\Repositories\Pronounce\PronounceMysqlRepository');

        $this->app->bind('App\Repositories\WordMean\WordMeanRepositoryInterface', 'App\Repositories\WordMean\WordMeanMysqlRepository');

        $this->app->bind('App\Repositories\Example\ExampleRepositoryInterface', 'App\Repositories\Example\ExampleMysqlRepository');

        $this->app->bind('App\Repositories\ExampleByTypeWord\ExampleByTypeWordRepositoryInterface', 'App\Repositories\ExampleByTypeWord\ExampleByTypeWordMysqlRepository');

        $this->app->bind('App\Repositories\EngWordMean\EngWordMeanRepositoryInterface', 'App\Repositories\EngWordMean\EngWordMeanMysqlRepository');
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
