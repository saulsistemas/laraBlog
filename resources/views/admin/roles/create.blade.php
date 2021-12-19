@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear nuevo Rol</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.roles.store']) !!}
                @include('admin.roles.partials.form')
                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}             
            {!! Form::close() !!}
        </div>
    </div>
@stop
