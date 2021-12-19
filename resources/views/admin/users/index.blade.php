@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('admin.posts.create') }}" class="btn btn-success float-right">Agregar</a>
    <h1>Lista de Posts</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
    @livewire('admin.user-index')
   
@stop
