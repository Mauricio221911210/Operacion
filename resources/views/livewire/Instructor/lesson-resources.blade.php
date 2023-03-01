<div class="card">
    <div class="card-body bg-gray-100">

        <header>
            <h1>Descargar Archivo</h1>
        </header>

        <div>
            <hr class="my-2">

            @if ($lesson->resource)
                <div class="flex justify-between items-center">
                    <p><i wire:click="download" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i>{{$lesson->resource->url}}</p>
                    <i class="fas fa-trash text-red-500 cursor-pointer"></i>
                </div>
            @else
            
            <form wire:submit.prevent="save">
                <div class="flex items-center ">
                    <input wire:model="file" type="file" class="form-input flex-1 ">
                    <button type="submit" class="btn btn-priamry text-sm ml-2 ">Subir</button>
                </div>

                <div class="text-green-500 font-bold mt-1" wire:loading wire:target="file">
                    Cargando ...
                </div>

                @error('file')
                    <span class="text-xs text-red-500 ">{{$message}}</span>
                @enderror

            </form>

          @endif
        </div>

    </div>
</div>
