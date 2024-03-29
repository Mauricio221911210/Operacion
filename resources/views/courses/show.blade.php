<x-app-layout>
    
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                {{--<img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">--}}
                @isset($course->image)
                    <img id="picture" class="w-full h-64 object-cover object-center" src="{{Storage::url($course->image->url)}}"  alt="">
                @else
                    <img id="picture" class="w-full h-64 object-cover object-center" src="https://images.pexels.com/photos/357514/pexels-photo-357514.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
                @endisset
            </figure>

            <div class="text-white">
                <h1 class="text-4xl">{{$course->title}}</h1>
                <h2 class=" text-xl mb-3 ">{{$course->subtitle}}</h2>
                <p class="mb-2 "><i class="fas fa-chart-line"></i> CD:{{$course->level->name}}</p>
                <p class="mb-2"><i class="fa fa-globe"></i> Zona:{{$course->category->name}}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Personas dentro del archivo:{{$course->students_count}}</p>
                <p class="mb-2"><i class="fa fa-wrench"></i> Tipo de Procesos:{{$course->price->name}}</p>
                
                {{--<p><i class="far fa-star"></i> Calificacion:{{$course->rating}}</p>--}}

            </div>

        </div>

    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3  gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1 ">
            <section class="card">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2"></h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-base "><i class="fas fa-check text-gray-600 mr-2"></i>{{$goal->name}}</li>
                        @endforeach
                    </ul>

                </div>

            </section> 

            <section class="mb-12">
                <h1 class="font-fold text-3xl mb-12">Analisis</h1>

                @foreach ($course->sections as $section)
                    <article class="mb-4 shadow" 
                        @if ($loop->first)
                            x-data="{ open: true }"
                            @else
                            x-data="{open: false}"
                        @endif >

                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="open = !open" >
                            <h1 class="font-bold text-lg text-gray-600">{{$section->name}}</h1>
                        </header>

                        <div class="bg-white py-2 px-4" x-show="open">
                            <ul class="gris grid-col-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text gray-700 text-base "><li class="fa fa-folder-open mr-2 text-gray-600"></li>{{$lesson->name}}</li>
                                @endforeach
                            </ul>

                        </div>

                    </article>
                @endforeach

            </section>

            <section>
                <h1 class="font-bold text-3xl">Requisitos</h1>

                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                           <li class="text-gray-700 text-base ">{{$requirement->name}}</li>
                    @endforeach
                </ul>

            </section>
                   <h1 class="font-bold text-3xl">Descripcion</h1>
                   <div class="text-gray-700 text-base">    
                    {!!$course->description!!}
                   </div>
            <section>

            </section>

        </div>
        
        <div class="order-1 lg:orden-2">
            <section class="card mb-4">
                <div class="card-body">

                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}" >
                       <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg ">Encargado: {{$course->teacher->name}} </h1>
                            <a class="text-blue-400 text-sm font-bold " href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                        </div>
                    </div>

                    @can('enrolled', $course)
                    
                    <a class="btn btn-block btn-danger mt-4" href="{{route('courses.status', $course)}}">Continuar Observando el archivo</a>



                    @else

                    <form action="{{route('courses.enrolled', $course)}}" method="POST">
                        @csrf 
                        <button class="font-bold py-2 px-4 rounded block text-center w-full bg-red-500 mt-4" type="submit">Entrar  al Archivo</button>
                    </form>

                    @endcan

                </div>

            </section>

            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                       @isset($course->image)
                <img id="picture" class="w-full h-64 object-cover object-center" src="{{Storage::url($course->image->url)}}"  alt="">
            @else
                <img id="picture" class="w-full h-64 object-cover object-center" src="https://images.pexels.com/photos/357514/pexels-photo-357514.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            @endisset
                        <div class="ml-3">
                            <h1>
                                <a class="font-bold text-gray-500 mb-3" href="{{route('courses.show', $similar)}}">{{Str::limit($similar->title, 40)}}</a>
                            </h1>
                            <div class="flex items-center mb-2">
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$similar->teacher->profile_photo_url}}" alt="">
                                 <p class="text-gray-700 text-sm ml-2">{{$similar->teacher->name}}</p>
                            </div>

                           {{-- <p class="text-sm"><i class="fas fa-star mr-2 text-yellow-400"></i>{{$similar->rating}}</p> --}}
                        </div>

                    </article>
                @endforeach
            </aside>
            
        </div>

    </div>

</x-app-layout>














































































