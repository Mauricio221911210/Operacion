@extends('adminlte::page')

@section('title', 'Libro de Operacion')

@section('content_header')
    <h1>Archivos Pendiente de Aprobacion</h1>
@stop

@section('content')

    @if (session('info'))
            <div class="alert alert-success">
                {{session('info')}}
            </div>
    @endif



    <div class="card">
        <div class="card-body">
            <table class="table table-striped ">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Zona</th>
                    <th>Proceso</th>
                </thead>

                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->title}}</td>
                            <td>{{$course->category->name}}</td>
                            <td>{{$course->price->name}}</td>
                            <td> 
                                <a class="btn btn-primary" href="{{route('admin.courses.status', $course)}}">Revisar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>    

        <div class="card-footer">
            {{$courses->links('vendor.pagination.bootstrap-5')}}
        </div>
    </div> 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop