<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use Blade;
use URL;

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
        /*
            Make Your Url Force Https 
        */
        // URL::forceScheme('https');
        //
        Gate::define('admin1', function (User $user) {
            return $user->role_id === 1;
        });
        /*
            Bootstrap Pagination Style
        */
        Paginator::useBootstrap();
        //

        /***
            Blade Directive , example using : @example or @example('expression') 
         */
        Blade::directive('count', function ($expression) {
            return "<?php echo DB::table($expression)->count() ?>";
        });
        //
    }
}
