<?php

namespace App\Providers;

use App\Models\Permissao;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

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
        $this->registerPolicies();

        //$gate->define('listar-usuarios',
        //function($user,$permissao){
        //return true == $permissao ;
        //}
        //);

        Gate::define('edit-settings', function ($user) {
            return $user->isAdmin;
        });

        foreach ($this->getPermissoes() as $permissao) {
            Gate::define($permissao->nome,
                function ($user) use ($permissao) {
                    return $user->existePapel($permissao->papeis) || $user->existeAdmin();
                }
            );
        }
    }

    public function getPermissoes()
    {
        return Permissao::with('papeis')->get();
    }

}
