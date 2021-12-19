<div class="form-group">
    {!! Form::label('name','Nombre',['class'=>'otro']) !!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de la etiqueta']) !!}
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror

    <h2>Lista de permisos</h2>
    @foreach ($permissions as $permission)
        <div>
            <label for="">
                {!! Form::checkbox('permissions[]',$permission->id,null,['class'=>'mr-1']) !!}
                {{$permission->description}}
            </label>
        </div>
    @endforeach
</div>

    