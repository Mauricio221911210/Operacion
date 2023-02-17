@extends('adminlte::page')

@section('title', 'Libro de Operacion')

@section('content_header')
    <h1>Asignar roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5>Nombre</h5>
            <p class="form-control">{{$user->name}}</p>

            <h5>Lista de Roles</h5>

            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method'  => 'put']) !!}
            
            
            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{$role->name}}
                    </label>
                </div>
            @endforeach


            {!! Form::submit('Asiganar rol', ['class' => 'btn btn-success mt-2']) !!}
            
            
            
            {!! Form::close() !!}


        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop