<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class PermissionsTableSeeder extends Seeder
{
    //$ php artisan db:seed --class=PermissionsTableSeeder
    private $exceptNames = [
        'LaravelInstaller*',
        'LaravelUpdater*',
        'debugbar*',
        'cashier.*',
        'ignition.*',
    ];

    private $exceptControllers = [
        'LoginController',
        'ForgotPasswordController',
        'ResetPasswordController',
        'RegisterController',
        'PayPalController',
        'HealthCheckController',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $routeCollection = Route::getRoutes();
        try {
            $role = Role::findByName('Admin');
            if (!$role) {
                $role = Role::create(['name' => 'Admin']);
            }
        } catch (Exception $e) {
            if ($e instanceof RoleDoesNotExist) {
                $role = Role::create(['name' => 'Admin']);
            }
        }
        foreach ($routeCollection as $route) {
            if ($this->match($route)) {
                // PermissionDoesNotExist
                try {
                    if (!$role->hasPermissionTo($route->getName())) {
                        $permission = Permission::create(['name' => $route->getName()]);
                        $role->givePermissionTo($permission);
                    }
                } catch (Exception $e) {
                    if ($e instanceof PermissionDoesNotExist) {
                        $permission = Permission::create(['name' => $route->getName()]);
                        $role->givePermissionTo($permission);
                    }
                }
            }
        }
        $user = User::find(1);
        if (!$user->hasRole('Admin')) {
            $user->assignRole('Admin');
        }
    }

    private function match(Illuminate\Routing\Route $route)
    {
        if ($route->getName() === null) {
            return false;
        } else {
            if (preg_match('/API/', class_basename($route->getController()))) {
                return false;
            }
            if (in_array(class_basename($route->getController()), $this->exceptControllers)) {
                return false;
            }
            foreach ($this->exceptNames as $except) {
                if (Str::is($except, $route->getName())) {
                    return false;
                }
            }
        }
        return true;
    }
}
