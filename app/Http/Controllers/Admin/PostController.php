<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::latest('id')->paginate(4);
        return view('admin.posts.index',compact('posts'));
    }

  
    public function create()
    {
        $categories = Category::pluck('name','id');
        $tags = Tag::all();
        return view('admin.posts.create',compact('categories','tags'));
    }


    public function store(StorePostRequest $request)
    {
        
        
        $post=Post::create($request->all());
        if ($request->file('file')) {
            $ruta='public/posts';
            $url =Storage::put($ruta,$request->file('file'));
            $post->image()->create([
                'url'=>$url,
            ]);
        }
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        return view('admin.posts.edit',compact('post'));
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
