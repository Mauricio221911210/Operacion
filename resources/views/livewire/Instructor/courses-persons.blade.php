<div>
    

    <h1 class="text-2xl font-bold mb-4">Personas del Archivo</h1>

    <x-table-responsive>

        <div class="px-6 py-4 ">
          <input  wire:model='search' class="form-input w-full flex-1 shadow-sm" placeholder="Ingrese el nombre del Usuario">
        </div>
    
        @if ($students->count())
            
        
        <table class="min-w-full divide-y divide-gray-200  ">
          <thead class="bg-gray-50">
          
            
    
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                      Nombre
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500">
                      Email
                    </th>
                  </tr>
    
            
         
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
    
            @foreach ($students as $student)
    
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10 ">

                    <img class="h-10 w-10 rounded-full object-cover object-center" src="{{$student->profile_photo_url}}" >
                    
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{$student->name}}
                    </div>
                    
                  </div>
                </div>
              </td>
    
              <td class="px-6 py-4 whitespace-nowrap "> 
                <div class="text-sm text-gray-900">{{$student->email}}</div>
              </td>
             
            
              
              <td class="px-6 py-4 whitespace-nowrap text-rigth text-sm font-medium ">
                <a href="" class="text-indigo-600 hover:text-indigo-900" >Ver </a>
              </td>
            </tr>
    
            @endforeach
    
          </tbody>
        </table>
    
        <div class="pc-6 py-4">
          {{$students->links()}}
        </div>
        @else
          <div class="px-6 py-4">
            No hay registros coincidente
          </div>
        @endif
    
      </x-table-responsive>

</div>
