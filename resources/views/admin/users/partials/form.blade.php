<div class="form-group">
    {!! Form::label('name','Nombre',['class'=>'otro']) !!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de la etiqueta']) !!}
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
    {{-- <label for="">Color:</label>
    <select name="color" id="color" class="form-control">
        <option value="red">Color rojo</option>
        <option value="verde">Color verde</option>
        <option value="azul" selected>Color azul</option>
    </select> --}}
    {!! Form::label('color','Color:',['class'=>'otro']) !!}
    {!! Form::select('color',$colors,null,['class'=>'form-control']) !!}
</div>       