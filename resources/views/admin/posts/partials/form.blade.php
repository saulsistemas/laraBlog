{!! Form::hidden('user_id',auth()->user()->id) !!}
<div class="form-group">
    {!! Form::label('name','Nombre',['class'=>'otro']) !!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del Post']) !!}
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug','Slug',['class'=>'otro']) !!}
    {!! Form::text('slug',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del slug','readonly']) !!}
    @error('slug')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>  

<div class="form-group">
    {!! Form::label('category_id','Categoría',['class'=>'otro']) !!}
    {!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
    @error('category_id')
    <span class="text-danger">{{$message}}</span>
    @enderror    
</div>  

<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
    @foreach ($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]',$tag->id,null,['class'=>'form-control']) !!}
            {{$tag->name}}
        </label>
    @endforeach
    <hr>
    @error('tags')
    <span class="text-danger">{{$message}}</span>
    @enderror      
</div>  
<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label for="font-weight-bold">
        {!! Form::radio('status',1,true) !!}
        Borrador
    </label>
    <label for="font-weight-bold">
        {!! Form::radio('status',2) !!}
        Publicado
    </label>
    <hr>
    @error('status')
    <span class="text-danger">{{$message}}</span>
    @enderror   
</div>  
<div class="form-group">
    {!! Form::label('extract','Extracto:',['class'=>'otro']) !!}
    {!! Form::textarea('extract',null,['class'=>'form-control']) !!}
    @error('extract')
    <span class="text-danger">{{$message}}</span>
    @enderror     
</div>  
<div class="form-group">
    {!! Form::label('body','Cuerpo del Post:',['class'=>'otro']) !!}
    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
    @error('body')
    <span class="text-danger">{{$message}}</span>
    @enderror      
</div>  