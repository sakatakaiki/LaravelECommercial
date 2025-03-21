<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\View;

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
        $categories = Category::all();
    $topCategories = Category::withCount('products')
        ->orderByDesc('products_count')
        ->limit(4)
        ->get();

    View::share(compact('categories', 'topCategories'));
    }
}
