<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\PostCreatedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Subscription;

class PostController extends Controller
{
    public function index()
    {
        // Kullanıcı ve kategori ile birlikte son yazıları alıyorum
        $posts = Post::with(['user', 'category'])->latest()->paginate(12); // Her sayfada 12 yazı

        // En çok yazısı olan 5 kategoriyi alıyorum
        $topCategories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(5)->get();

        return view('posts.index', compact('posts', 'topCategories'));
    }

    public function create()
    {
        return view('posts.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        
        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->user_id = auth()->id();
        $post->category_id = $request->category_id;
        $post->views = 0;

        // Eğer resim yüklenmişse, resmi yükleyip dosya adını kaydediyorum
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $post->image = basename($imagePath);
        }

        // Postu kaydediyorum
        $post->save();

        // Status = 1 olan abonelere mail gönderiyorum
        $subscriptions = Subscription::where('status', 1)->get();

        try {
            foreach ($subscriptions as $subscription) {
                Mail::to($subscription->email)->send(new PostCreatedMail($post));
            }
            // Başarılı ise  burada bir mesaj dönderebilriim.
        } catch (\Exception $e) {
            // Hata varsa hata mesajını log'a yazıyorum
            \Log::error('Mail gönderim hatası: ' . $e->getMessage());
        }


        return redirect()->route('posts.index')->with('success', 'Yazı başarıyla eklendi..');
    }


    public function show($slug)
    {
        // Slug ile post'u bulıyorum
        $post = Post::where('slug', $slug)->firstOrFail();

        // Ziyaret edilen gönderileri session'da kontrol ediyorum
        $visitedPosts = session()->get('visited_posts', []);

        // Eğer bu gönderi daha önce ziyaret edilmemişse sayaç artırıyorum
        if (!in_array($post->id, $visitedPosts)) {
            $post->increment('views');

            // Ziyaret edilen gönderiyi session'a ekliyorum
            session()->push('visited_posts', $post->id);
        }

        $relatedPosts = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->take(2)->get();


        return view('posts.show', compact('post', 'relatedPosts')); 
    }


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post')); 
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // SADECE BURADAKİ UZANTILARI KABUL EDİYORUM
        ]);

        // Postu güncelle
        $post->title = $request->title;
        $post->slug = Str::slug($post->title); // Slug'ı başlıktan otomatik oluşturuyorum
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        // Eğer yeni bir resim yüklenmişse, mevcut resmi siliyorum ve yeni resmi kaydediyorum
        if ($request->hasFile('image')) {
            // Mevcut resmi sil
            if ($post->image) {
                \Storage::delete('public/images/' . $post->image);
            }

            // Yeni resmi yüklüyorum ve dosya adını kaydediyorum
            $imagePath = $request->file('image')->store('public/images');
            $post->image = basename($imagePath); // Yalnızca dosya adını saklıyorum
        }

        // Yazıyı kaydediyorum
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
