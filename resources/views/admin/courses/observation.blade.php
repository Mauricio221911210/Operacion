@extends('adminlte::page')

@section('title', 'Libro de Operacion')

@section('content_header')
    <h1>Observaciones del archivo: {{$course->title}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}
                <div class="form-group">
                    {!! Form::label('body', 'Observaciones del Archivo') !!}
                    {!! Form::textarea('body', null) !!}
                
                @error('body')
                    <strong class="text-danger">{{$message}}</strong>
                @enderror
                
                </div>
                {!! Form::submit('Rechazar Archivo', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    
<script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@stop