<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Son 5 gönderiyi al
        $posts = Post::latest()->take(6)->get();

        $banners = Post::where('banner', '1')->get(); // banner 1 olanları al


        // En çok yazısı olan 6 kategoriyi alıyorum
        $topCategories = Category::withCount('posts') // Yazı sayısını alıyorum
            ->orderBy('posts_count', 'desc') // Yazı sayısına göre sıralıyorum
            ->take(6) // İlk 6 kategori
            ->get();

        // Tüm kategorileri alıyorum
        $allCategories = Category::all();

        $popularPosts = Post::orderBy('views', 'desc')->take(10)->get();

        return view('home', compact('posts', 'topCategories', 'allCategories', 'banners', 'popularPosts'));
    }


}
