<x-app-layout>
{{--portada--}}

    <section class="bg-cover" style="background-image: url({{asset('img/home/torres1.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36 ">
            <div class="w-full md:w-3/4 lg:w-1/2">
          <h1 class="text-white font-fold text-4xl">Libro de Operacion</h1>
          <p class="text-white text-lg mt-2 mb-4">Bienvenido al Libro de Operacion podra ver los documentos actualizado en la parte inferior del sitio web</p>

          @livewire('search')
        
        
            </div>
        </div>
 

    </section>

    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6"> Contenido   </h1>


        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover"  src="{{asset('img/home/ejemplo1.jpg')}}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Ubicacion</h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                     Ea soluta reprehenderit  optio quae assumenda libero ratione.</p>

                     

            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/ejemplo2.jpg')}}" alt="">
                </figure>
              
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Ubicacion</h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                     Ea soluta reprehenderit  optio quae assumenda libero ratione.</p>

            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/ejemplo3.jpg')}}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Ubicacion</h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                     Ea soluta reprehenderit  optio quae assumenda libero ratione.</p>

            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/ejemplo4.jpg')}}" alt="">
                </figure>
 
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Ubicacion</h1>
                </header>
                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                     Ea soluta reprehenderit  optio quae assumenda libero ratione.</p>

            </article>


        </div>



    </section>

    <section class="mt-24">
    </section>

    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">No sabes a que CD Perteneces </h1>
        <p class="text-center text-white ">Vizualiza el Mapa que se encuentra abajo  </p>

        <iframe class=" w-full object-cover object-center" src="https://www.google.com/maps/d/embed?mid=1Pa6BWzXYOS4K0GNl6Noy3Dq4NRd0BkVo&ehbc=2E312F" width="640" height="480"></iframe>

        {{--<div class="flex justify-center mt-4">
            <a href="{{route('courses.index')}}" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
                 Ver Archivos
            </a>
        </div>--}}
    </section>

    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-700">Últimos Archivos</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Archivos de ultimo momento</p>

        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
            <x-course-card :course="$course" />
            @endforeach

            
       
       
        </div>
    
    </section>





</x-app-layout>


























































































