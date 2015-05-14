<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/11/2015
 * @Time: 2:27 PM
 */

namespace Funny\Providers;


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
        $this->app->bind(
            'Funny\Repositories\CategoryRepositoryInterface',
            'Funny\Repositories\Eloquent\CategoryRepository'
        );
        $this->app->bind(
            'Funny\Repositories\EpisodeRepositoryInterface',
            'Funny\Repositories\Eloquent\EpisodeRepository'
        );
        $this->app->bind(
            'Funny\Repositories\NationRepositoryInterface',
            'Funny\Repositories\Eloquent\NationRepository'
        );
        $this->app->bind(
            'Funny\Repositories\FilmRepositoryInterface',
            'Funny\Repositories\Eloquent\FilmRepository'
        );
    }
}