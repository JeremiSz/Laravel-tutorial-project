<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index(){
        return view('landing',[
            "posts" => 
                Post::latest('published')->
                filter(request(['search','category']))->
                with('category')->
                paginate(3)->withQueryString(),
        ]);
    }

    public function show(Post $post){
        return view('post',[
            "post" => $post->load('category'),
        ]);
    }

    public function create(){
        return view('posts.create',
    [
        "categories" => Category::all(),]);
    }
    public function store(){
        $attributes = request()->validate([
            "title" => "required",
            "body" => "required",
            "published" => ["required","date"],
            "category" => [],
        ]);
        $post = new Post([
            "title" => $attributes['title'],
            "body" => $attributes['body'],
            "published" => $attributes['published'],
            "category_id" => $attributes['category'],
            "sample" => substr($attributes['body'],0,100)
        ]);
        $post->save();
        return redirect('/');
    }
    public function all(){
        return view('posts.all',[
            "posts" => Post::latest('published')->paginate(10),
        ]);
    }
    public function edit(Post $post){
        return view('posts.edit',[
            "post" => $post,
            "categories" => Category::all(),
        ]);
    }
    public function update(Post $post){
        $attributes = request()->validate([
            "title" => "required",
            "body" => "required",
            "published" => ["required","date"],
            "category" => [],
        ]);
        $post->update([
            "title" => $attributes['title'],
            "body" => $attributes['body'],
            "published" => $attributes['published'],
            "category_id" => $attributes['category'],
            "sample" => substr($attributes['body'],0,100)
        ]);
        return back()->with('success','Post updated!');
    }

    public function destroy(Post $post){
        $post->delete();
        return back()->with('success','Post deleted!');
    }
}
