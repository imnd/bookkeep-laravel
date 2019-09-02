<?php
namespace App\Providers;

use
    Illuminate\Support\ServiceProvider,
    Illuminate\Support\Facades\Auth,
    Illuminate\Support\Facades\View,
    App\Models\Users;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param UsersRepositoryInterface $repo
     * @return void
     */
    public function boot(Users $users)
    {
        View::composer('*', function ($view) use ($users) {
            if ($id = Auth::id()) {
                $view->with('user', Users::find($id));
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
