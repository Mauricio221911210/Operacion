<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

          

            <!-- Page Content -->
            <div class="container py-8 grid grid-cols-5 gap-6">

                <aside>
                    <h1 class="font-bold text-lg mb-4">Edicion del Archivo</h1>
        
                    <ul class="text-sm rtext-gray-600 mt-4 ">
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit', $course) border-green-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.edit', $course)}}">Informacion del Archivo </a>
                        </li>

                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.curriculum', $course)  border-green-400 @else border-transparent @endif pl-2 ">
                            <a href="{{route('instructor.courses.curriculum', $course)}}">Apartados del Archivo</a>
                        </li>
                        
                        {{--<li class="leading-7 mb-1 border-l-4 border-transparent pl-2 ">
                            <a href="">Subtemas del Archivo</a>
                        </li>--}}
        
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.goals', $course)  border-green-400 @else border-transparent @endif pl-2 ">
                            <a href="{{route('instructor.courses.goals', $course)}}">Metas del Archivo </a>
                        </li>
        
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.persons', $course) border-green-400 @else border-transparent @endif pl-2 ">
                            <a href="{{route('instructor.courses.persons', $course)}}">Personas</a>
                        </li>

                        @if ($course->observation)
                            <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.observation', $course) border-green-400 @else border-transparent @endif pl-2 ">
                                <a href="{{route('instructor.courses.observation', $course)}}">Observacion</a>
                            </li>
                        @endif
                    </ul>

                    @switch($course->status)
                        @case(1)

                            <form action="{{route('instructor.courses.status', $course)}}" method="POST">
                                @csrf


                                <button class="btn btn-danger" type="submit">Solicitar Revision </button>
                            </form>

                            @break
                        @case(2)
                            <div class="card text-gray-500">
                                <div class="card-body">
                                    Este Archivo se enucentra en revision
                                </div>
                            </div>
                        

                            @break

                        @case(3)

                        <div class="card text-gray-500">
                            <div class="card-body">
                                Este Archivo se enucentra Publicado
                            </div>
                            <form action="{{route('instructor.courses.status', $course)}}" method="POST">
                                @csrf


                                <button class="btn btn-danger" type="submit">Volver a Solicitar Revision </button>
                            </form>
                        </div>
                        
                       

                            @break

                        @default
                            
                    @endswitch

                    

                </aside>
        
                <div class="col-span-4 card">
                    <main class="card-body text-gray-600 ">
                       
                        {{$slot}}
        
                    </main>
                </div>
         
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
            
        
        {{$js}}


        @endisset

    </body>
</html>
