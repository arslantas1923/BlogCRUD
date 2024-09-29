<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Post;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $posts = Post::latest()->take(5)->get(); 
        // En çok yazısı olan 5 kategoriyi al
        $topCategories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(5)->get();

        // Tüm kategorileri al
        $allCategories = Category::all();

        return view('auth.register', compact('posts', 'topCategories', 'allCategories'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
}
