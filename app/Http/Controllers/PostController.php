<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    public function store()
    {
        Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'category_id' => request('category_id'),
            'slug' => str_slug(request('title'))
        ]);

        return redirect('/home');
    }

}
