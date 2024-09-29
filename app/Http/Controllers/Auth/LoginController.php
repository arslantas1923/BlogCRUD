<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Post;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $posts = Post::latest()->take(5)->get(); 
        // En çok yazısı olan 5 kategoriyi al
        $topCategories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(5)->get();

        // Tüm kategorileri al
        $allCategories = Category::all();

        return view('auth.login', compact('posts', 'topCategories', 'allCategories'));

    }



    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/')->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('success', 'Çıkış işlemi başarıyla gerçekleştirildi.');
    }
}
