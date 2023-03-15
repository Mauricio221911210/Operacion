<div class="container py-8">
    <!-- component -->
    
  <x-table-responsive>

    <div class="px-6 py-4 flex ">
      <input wire:keydown="limpiar_page" wire:model='search' class="form-input flex-1 shadow-sm" placeholder="Ingrese el nombre de un archivo">
      <a class="btn btn-danger ml-2" href="{{route('instructor.courses.create')}}">Crear nuevo Archivo</a>
    </div>

    @if ($courses->count())
        
    
    <table class="min-w-full divide-y divide-gray-200  ">
      <thead class="bg-gray-50">
      
        

              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                  Nombre
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                  Matriculados
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                  Status
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Editar</span>
                </th>
              </tr>

        
     
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">

        @foreach ($courses as $course)

        <tr>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex-shrink-0 h-10 w-10 ">
                @isset($course->image)
                <img class="h-10 w-10 rounded-full object-cover object-center" src="{{Storage::url($course->image->url)}}" >
                @else
                <img class="h-10 w-10 rounded-full object-cover object-center" src="https://images.pexels.com/photos/357514/pexels-photo-357514.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" >
                @endisset
              </div>
              <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">
                  {{$course->title}}
                </div>
                <div class="text-sm text-gray-500">
                  {{$course->category->name}}
                </div>
              </div>
            </div>
          </td>

          <td class="px-6 py-4 whitespace-nowrap "> 
            <div class="text-sm text-gray-900">{{$course->students->count()}}</div>
            <div class="text-sm text-gray-500">Personas dentro del archivo</div>
          </td>
         
          <td class="px-6 py-4 whitespace-nowrap">
            @switch($course->status)
                @case(1)
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 bg-red-400  " >
                      Borrador                                                            
                    </span>
                    @break
                @case(2)
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 bg-yellow-400  " >
                      Revision De Zona
                    </span>
                    @break
                @case(3)
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 bg-green-700  " >
                      Publicado
                    </span>
                    @break
                @case(4)
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 bg-yellow-400  " >
                      Revision  Divisional
                    </span>
                @break
                @default
                    
            @endswitch
          
          </td>
          
          <td class="px-6 py-4 whitespace-nowrap text-rigth text-sm font-medium ">
            <a href="{{route('instructor.courses.edit', $course)}}" class="text-indigo-600 hover:text-indigo-900" >Editar</a>
          </td>
        </tr>

        @endforeach

      </tbody>
    </table>

    <div class="pc-6 py-4">
      {{$courses->links()}}
    </div>
    @else
      <div class="px-6 py-4">
        No hay registros coincidente
      </div>
    @endif

  </x-table-responsive>

    
</div>
