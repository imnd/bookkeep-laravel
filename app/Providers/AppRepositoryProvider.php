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
            'Users',
        ] as $modelName) {
            $this->app->bind('App\Contracts\\' . $modelName . 'RepositoryInterface', 'App\Repositories\\' . $modelName . 'Repository');
        }
    }
}
