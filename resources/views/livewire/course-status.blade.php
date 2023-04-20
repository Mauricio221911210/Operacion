<div class="mt-8">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <figure>
                @isset($course->image)
                <img id="picture" class="w-full h-64 object-cover object-center" src="{{Storage::url($course->image->url)}}"  alt="">
            @else
                <img id="picture" class="w-full h-64 object-cover object-center" src="https://images.pexels.com/photos/357514/pexels-photo-357514.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
            @endisset 
            </figure>

            <div class="text-id text-gray-600 font-bold mt-4">
                 {{$current->name}}
            </div>

            @if ($current->description)
                <div class="text-gray-600">
                    {{$current->description->name}}
                </div>
            @endif

            {{--<div class="flex items-center mt-4 cursor-pointer " wire:click="completed">

                @if ($current->completed)
                    <i class="fas fa-toggle-on text-2x1 text-green-600 "></i>
                @else
                    <i class="fas fa-toggle-off text-2x1 text-gray-600 "></i>
                @endif

                <p class="text-sm ml-2"> Marcar esta unidad como culminada </p>
            </div>--}}
            @if ($current->resource)
            <div class="flex items-center text-gray-600 cursor-pointer" wire:click="download">
                <i class="fas fa-download text-lg text-gray-600"></i>
                <p class="text-sm ml-2">Descargar Archivo</p>
            </div> 

            @endif

            <div class="card mt-2">
                <div class="card-body flex text-gray-500 font-bold">
                    
                    @if ($this->previous)
                         <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer ">Archivo Anterior </a>
                    @endif

                    @if ($this->next)
                    <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer">Archivo Siguiente </a>
                    @endif

                   
                </div>
            </div>

        </div>

        <div class="bg-white shadow-lg rounded overflow-hidden">
            <div class="px-6 py-4">
                <h1 class="text 2xl leading-8 text-center mb-4 " > Nombre del Archivo: {{$course->title}}</h1>

                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full mr-4 " src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>
                    <div class="">
                        <p>{{$course->teacher->name}}</p>
                        <a class="text-blue-500 text-sm " href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                    </div>
                </div>

                   
                {{--Revision, Observaciones y Aprobacion--}}
                <div class="card-body"  >

                    @switch($course->status)
                        @case(2)
                        <form action="{{route('admin.courses.revision', $course)}}" class="mt-4" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success w-full"> Aprobar Revision</button>
                        </form>
                            @break
                        @case(4)
                        <form action="{{route('admin.courses.approved', $course)}}" class="mt-4" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success w-full"> Aprobar Archivo</button>
                        </form>
                            @break
                        @default
                    @endswitch

                    @can('Ver dashboard')
                    <a href="{{route('admin.courses.observation', $course)}}" class="btn btn-success w-full block text-center mt-4 " >Observaciones del Archivo</a>
                    @endcan

                </div>

                
                {{--<p class="gray-600 text-sm mt-2">{{$this->advance . '%'}} Completado</p>

                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                      <div style="width:{{$this->advance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500 transition-all duration-500 "></div>
                    </div>
                </div>--}}

                
                <ul class="my-2">
                    @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4 ">
                            <a class="font-bold text-base inline-block mb-2" href="">{{$section->name}}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex">
                                        <div>
                                            @if ($lesson->completed)

                                            @if ($current->id == $lesson->id)
                                            <span class="inline-block w-4 h-4 border-2 border-green-500 rounded-full mr-2 mt-1"></span>
                                            @else
                                            <span class="inline-block w-4 h-4 bg-green-500 rounded-full mr-2 mt-1"></span>
                                            @endif

                                            @else
                                            
                                            @if ($current->id == $lesson->id)
                                            <span class="inline-block w-4 h-4 border-2 border-green-500 rounded-full mr-2 mt-1"></span>
                                            @else
                                            <span class="inline-block w-4 h-4 bg-green-500 rounded-full mr-2 mt-1"></span>   
                                            @endif
                                            
                                            @endif
                                        </div>
                                        <a class="cursor-pointer"  wire:click="changeLesson({{$lesson}})" >{{$lesson->name}}
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
