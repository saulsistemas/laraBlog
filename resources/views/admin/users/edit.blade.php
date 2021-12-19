@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Asignar un rol</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
<div class="card">
    <div class="card-body">
        <p class="h5">Nombre</p>
        <p class="form-control">{{$user->name}}</p>
        {!! Form::model($user,['route'=>['admin.users.update',$user], 'method'=>'put']) !!}
            {{-- @include('admin.users.partials.form') --}}
            @foreach ($roles as $rol)
                <div>
                    <label for="">
                        {!! Form::checkbox('roles[]',$rol->id,null,['class'=>'form-control']) !!}
                        {{$rol->name}}
                    </label>
                </div>
            @endforeach
            {!! Form::submit('Asignar Rol',['class'=>'btn btn-success mr-2']) !!}             
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
$(document).ready( function() {
  $("#name").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-'
  });
});
    </script>
@endsection