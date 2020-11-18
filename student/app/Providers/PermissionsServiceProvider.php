<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Auth;
use App\Permission;
use App\Roles;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->slug, function ($user) use ($permission) {
                  return $user->hasPermissionTo($permission);
                });
            });
        } catch(\Exception $e) {
            report ($e);
            return false;
        }

        Blade::if('administrator', function ($role) {
            return auth()->user()->hasRole($role);
        });

        Blade::if('user', function ($role) {
            return auth()->user()->hasRole($role);
        });

       /*Blade::directive('endrole', function ($role) {
       return "<?php } ?>";
       }); */
    }
}