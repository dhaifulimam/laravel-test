<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' In ' . $category->name;
        }
        if (request('authors')) {
            $author = User::firstWhere('username', request('authors'));
            $title = ' By ' . $author->name;
        }

        return view('posts', [
            "title" => "All Post" . $title,
            //"post" => Post::all()
            "post" => Post::latest()->Filter(request(['search', 'category', 'authors']))->paginate(4)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('article', [
            "title" => "article",
            "post" => $post
        ]);
    }
}
