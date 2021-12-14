<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::where('status',2)->latest('id')->paginate(8);
        return view('post.index',compact('posts'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Post $post)
    {
        $similares = Post::where('category_id', $post->category_id)
                           ->where('status',2)
                           ->where('id','!=',$post->id)
                           ->latest('id')
                           ->take(4)
                           ->get();
        return view('post.show',compact('post','similares'));
    }

  
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
