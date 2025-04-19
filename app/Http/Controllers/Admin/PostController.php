<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CreatePostRequest;
use App\Http\Requests\admin\EditPostRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->paginate(20);
       return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {

        $tags = explode(',', $request->tags);

        // Check If request Has Input Image And Store It

        if($request->has('image'))
        {
            $filename = time(). '_' . $request->file('image')->getClientOriginalName();

            $request->file('image')->storeAs('uploads', $filename , 'public');
        }

        $post =  auth()->user()->posts()->create([
            'title' => $request->title,
            'image' => $filename ?? null ,
            'post' => $request->post,
            'category_id' => $request->category,

        ]);

        foreach($tags as $tagName)
        {

            $tag = Tag::firstOrCreate(['name' => $tagName]);

            $post->tag()->attach($tag);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        $categories = Category::all();

        $tags = $post->tag()->implode('name', ',');
        return view('admin.posts.edit', compact('post', 'tags', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditPostRequest $request, Post $post)
    {
        $tags = explode(',', $request->tags);
       if($request->has('image'))
       {
            Storage::delete('public/uploads/'. $post->image);

            $filename = time(). '_'. $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('uploads', $filename , 'public');
       }


       $post->update([
            'title' => $request->title,
            'image' => $filename ?? $post->image ,
            'post' => $request->post,
            'category_id' => $request->category,
       ]);

       $newTags = [];

       foreach($newTags as $newTag)
       {
                $tag  = Tag::firstOrCreate(['name' => $newTag]);
                array_push($newTags, $tag->id);
       }

       $post->tag()->sync($newTags);

       return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        if($post->image)
        {
            Storage::delete('public/uploads/'. $post->image);
        }

        $post->tag()->detach();

        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
