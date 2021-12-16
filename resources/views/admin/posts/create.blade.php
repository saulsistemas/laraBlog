@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear nuevo Post</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'admin.tags.store','autocomplete'=>'off']) !!}
                @include('admin.posts.partials.form')
                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}             
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script>
$(document).ready( function() {
  $("#name").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-'
  });
});

ClassicEditor
.create( document.querySelector( '#extract' ) )
.catch( error => {
    console.error( error );
} );

ClassicEditor
.create( document.querySelector( '#body' ) )
.catch( error => {
    console.error( error );
} );
    </script>
@endsection