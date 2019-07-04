<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider,
    Illuminate\Support\Facades\View,
    App\Contracts\UsersRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param UsersRepositoryInterface $repo
     * @return void
     */
    public function boot(UsersRepositoryInterface $repo)
    {
        View::composer('*', function ($view) use ($repo) {
            if ($user = $repo->findCurrent()) {
                $view->with('user', $user);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
