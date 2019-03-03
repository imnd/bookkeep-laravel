<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ([
            'Articles', 
            'ArticleSubcats', 
            'Bills',
            'Clients',
            'Contracts',
            'Invoices',
            'Purchases',
            'Regions',
            'Settings',
        ] as $modelName) {
            $this->app->bind('App\Repositories\\' . $modelName . 'RepositoryInterface', 'App\Repositories\\' . $modelName . 'Repository');
        }
    }
}
