<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::latest('id')->paginate(4);
        return view('admin.posts.index',compact('posts'));
    }

  
    public function create()
    {
        return view('admin.tags.index',compact('tags'));
    }


    public function store(Request $request)
    {
        return view('admin.tags.index',compact('tag'));
    }

 
    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        //
    }

 
    public function update(Request $request, Post $post)
    {
        //
    }


    public function destroy(Post $post)
    {
        //
    }
}
