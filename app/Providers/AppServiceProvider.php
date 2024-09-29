<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Bu satırı ekleyin
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Tüm kategorileri ve en çok yazısı olan kategorileri her view'a ekliyorum
        View::composer('*', function ($view) {
            $allCategories = Category::all(); // Tüm kategorileri alıyorum
            $topCategories = Category::withCount('posts') // Yazı sayısını alıyorum
                ->orderBy('posts_count', 'desc') // Yazı sayısına göre sıralıyorum
                ->take(6) // İlk 6 kategori
                ->get();
                
            $view->with('allCategories', $allCategories)
                ->with('topCategories', $topCategories); // Her iki değişkeni de ekledik
        });
    }

    public function register()
    {
        //
    }
}
