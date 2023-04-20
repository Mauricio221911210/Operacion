@props(['course'])



<article class="card">
    {{--<img class="h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">--}}
    @isset($course->image)
            <img id="picture" class="h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
        @else
        <img id="picture" class="h-36 w-full object-cover" src="https://images.pexels.com/photos/357514/pexels-photo-357514.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
         @endisset




    <div class="card-body">
        <h1 class="card-title">{{Str::limit($course->title, 40)}}</h1>
        <p class="text-gray-500 text-sm mb-2">Encargado: {{$course->teacher->name}}</p>
        
        <div class="flex">


    {{-- <ul class="flex text-sm">
            <li class="mr-1">
                <i class="fas fa-star {{$course->rating >= 1 ? 'text-yellow-400' : 'text-gray-400'}}"></i>
            </li>
            <li class="mr-1">
                <i class="fas fa-star {{$course->rating >= 2 ? 'text-yellow-400' : 'text-gray-400'}}"></i>
            </li>
            <li class="mr-1">
                <i class="fas fa-star {{$course->rating >= 3 ? 'text-yellow-400' : 'text-gray-400'}}"></i>
            </li>
            <li class="mr-1">
                <i class="fas fa-star {{$course->rating >= 4 ? 'text-yellow-400' : 'text-gray-400'}}"></i>
            </li>
            <li class="mr-1">
                <i class="fas fa-star {{$course->rating == 5 ? 'text-yellow-400' : 'text-gray-400'}}"></i>
            </li>
        </ul> --}}

        <p class="text-sm text-gray-500 ml-auto">
            <i class="fas fa-users"></i>
            {{$course->students_count}}
        </p>

        </div>

        <a href="{{route('courses.show', $course)}}" type="submit" class=" mt-4 btn btn-block  bg-blue-500 text-white ">
            Mas información
        </a>
   
    </div>

</article>