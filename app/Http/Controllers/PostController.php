<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

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
        $this->authorize('published',$post);
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
    public function category(Category $category)
    {
        $posts = Post::where('category_id',$category->id)
                ->where('status',2)
                ->latest('id')
                ->paginate(2);
        #return $posts;
        return view('post.category',compact('posts','category'));
    }
    public function tag(Tag $tag){
        $posts =$tag->posts()->where('status',2)->latest('id')->paginate(4);
        return view('post.tag',compact('posts','tag'));
    }
}
