<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create','store');
        $this->middleware('can:admin.posts.edit')->only('edit','update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }
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


    public function store(PostRequest $request)
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
        return redirect()->route('admin.posts.edit',$post)->with('info','El post se Guardo correctamente');
    }

 
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }


    public function edit(Post $post)
    {
        $this->authorize('author',$post);
        $categories = Category::pluck('name','id');
        $tags = Tag::all();
        return view('admin.posts.edit',compact('post','categories','tags'));
    }

 
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author',$post);///regla de autirzacion
        $post->update($request->all());
        if ($request->file('file')) {
            $ruta='public/posts';
            $url =Storage::put($ruta,$request->file('file'));
            
            if ($post->image) {
                Storage::delete($post->image->url);
                $post->image->update([
                    'url'=>$url,
                ]);
            }else{
                $post->image()->create([
                    'url'=>$url,
                ]);
            }
        }
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }
        return redirect()->route('admin.posts.edit',$post)->with('info','El post se actualizo correctamente');
    }


    public function destroy(Post $post)
    {
        $this->authorize('author',$post);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('info','El post se eliminó con exito');
    }
}
