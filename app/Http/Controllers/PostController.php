<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {

        $posts = Post::with('category', 'tag')->latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function home()
    {
        // if you don’t put with() here, you will have N+1 query performance problem
        $posts = Post::with('category', 'tag')->take(5)->latest()->get();
        return view('pages.home', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::with('tag')->findOrFail($id);

        return view('posts.show', compact('post'));
    }
}
