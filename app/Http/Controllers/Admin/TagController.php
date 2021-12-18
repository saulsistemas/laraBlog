<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::latest('id')->paginate(4);
        
        #$tags = Tag::all();
        return view('admin.tags.index',compact('tags'));
    }


    public function create()
    {
        $colors=[
            'red'=>'Color Rojo',
            'yellow'=>'Color Amarillo',
            'green'=>'Color Verde',
            'blue'=>'Color Azul',
            'indigo'=>'Color Indigo',
            'purple'=>'Color Morado',
            'pink'=>'Color Rosado',
        ];
        return view('admin.tags.create',compact('colors'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:tags',
        ]);
        $tag= Tag::create($request->all());
        return redirect()->route('admin.tags.edit',compact('tag'))->with('info','La etiqueta se creo con exito');
    
    }


    public function show(Tag $tag)
    {
        return view('admin.tags.show',compact('tag'));
    }


    public function edit(Tag $tag)
    {
        $colors=[
            'red'=>'Color Rojo',
            'yellow'=>'Color Amarillo',
            'green'=>'Color Verde',
            'blue'=>'Color Azul',
            'indigo'=>'Color Indigo',
            'purple'=>'Color Morado',
            'pink'=>'Color Rosado',
        ];
        return view('admin.tags.edit',compact('tag','colors'));
    }

 
    public function update(Request $request,Tag $tag)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>"required|unique:tags,slug,$tag->id",
            'color'=>'required',

        ]);
       
        $tag->update($request->all());
        return redirect()->route('admin.tags.edit',$tag)->with('info','La etiqueta se actualizo con exito');
    
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info','La etiqueta se eliminó con exito');
    
    }
}
