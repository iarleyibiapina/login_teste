<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Exception;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     * 
     * Adicionando papeis
     */
    public function boot()
    {
        $this->registerPolicies();

        try {
            // trazendo permissoes
            $permissions = Permission::with('roles')->get();
            // criando politica de permissao com gate
            // verifica se um uusario tem certa permissao
            foreach ($permissions as $permission) {
                Gate::define($permission->name, function (User $user) use ($permission) {
                    foreach ($user->roles as $role) {
                        if ($role->permissions->contains('name', $permission->name)) {
                            return true;
                        }
                    }
                    return false;
                });
            }
        } catch (Exception $e) {
            return false;
        }
    }
}
