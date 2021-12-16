@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Posts</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Agregar</a>
            @livewire('admin.post-index')
        </div>
      
    </div>
@stop
