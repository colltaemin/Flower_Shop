<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use Gate;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('list-category', fn (User $user) => $user->checkPermissionAccess('list_category'));

        Gate::define('add-category', fn (User $user) => $user->checkPermissionAccess('add_category'));

        Gate::define('edit-category', fn (User $user) => $user->checkPermissionAccess('edit_category'));

        Gate::define('delete-category', fn (User $user) => $user->checkPermissionAccess('delete_category'));

        Gate::define('list-menu', fn ($user) => $user->checkPermissionAccess('list_menu'));

        Gate::define('add-menu', fn ($user) => $user->checkPermissionAccess('add_menu'));

        Gate::define('edit-menu', fn ($user) => $user->checkPermissionAccess('edit_menu'));

        Gate::define('delete-menu', fn ($user) => $user->checkPermissionAccess('delete_menu'));

        Gate::define('list-product', fn ($user) => $user->checkPermissionAccess('list_product'));

        Gate::define('add-product', fn ($user) => $user->checkPermissionAccess('add_product'));

        Gate::define('edit-product', fn ($user) => $user->checkPermissionAccess('edit_product'));

        Gate::define('delete-product', fn ($user) => $user->checkPermissionAccess('delete_product'));

        Gate::define('list-user', fn ($user) => $user->checkPermissionAccess('list_user'));

        Gate::define('add-user', fn ($user) => $user->checkPermissionAccess('add_user'));

        Gate::define('edit-user', fn ($user) => $user->checkPermissionAccess('edit_user'));

        Gate::define('delete-user', fn ($user) => $user->checkPermissionAccess('delete_user'));
    }
}
