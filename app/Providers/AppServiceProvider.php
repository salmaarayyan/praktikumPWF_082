<?php

namespace App\Providers;

use App\Models\Product;
use App\Policies\ProductPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Product::class, ProductPolicy::class);

        Gate::define('manage-products', function ($user) {
            return in_array($user->role, ['admin', 'user'], true);
        });

        Gate::define('export-product', function ($user) {
            return $user->role === 'admin';
        });
    }
}
