<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\ReqKonsul;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('home-admin',function(User $user){
            return $user->role === 'admin';
        });

        Gate::define('home-dokter',function(User $user){
            return $user->role === 'dokter';
        });

        Gate::define('home-mahasiswa',function(User $user){
            return $user->role === 'mahasiswa';
        });

        Gate::define('home-pengurus',function(User $user){
            return $user->role === 'petugas';
        });

        Gate::define('crud-konsultasi', function (User $user, Mahasiswa $mahasiswa) {
            return $user->id === $mahasiswa->user_id;
        });

        
    }
}
