<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


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
       // Share the cart item count with specific views
       View::composer('*', function ($view) {
        $totalCartItem = 0;
        if (Auth::check()) {
            $totalCartItem = Cart::where('user_id', Auth::id())->count();
        }
        $view->with('totalCartItem', $totalCartItem);
    });
    }
}
