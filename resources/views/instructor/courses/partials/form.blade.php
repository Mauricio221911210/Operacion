<div class="mb-4">
    {!! Form::label('title', 'Titulo del archivo:') !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('title') ? ' border-red-600' : '')]) !!}

    @error('title')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror

</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del archivo:') !!}
    {!! Form::text('slug', null, [ 'readonly' => 'readonly', 'class' => 'form-input block w-full mt-1' . ($errors->has('slug') ? ' border-red-600' : '')]) !!}

    @error('slug')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror

</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtitulo del archivo:') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('subtitle') ? ' border-red-600' : '')]) !!}

    @error('subtitle')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror

</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripcion del archivo:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1' . ($errors->has('description') ? ' border-red-600' : '')]) !!}

    @error('description')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror

</div>

<div class="grid grid-cols-2 gap-4">
    <div>
        {!! Form::label('category_id', 'Zonas') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block w-full mt-1']) !!}

        @error('category_id')
        <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror

    </div>

    <div>
        {!! Form::label('level_id', 'CD') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1']) !!}

        @error('level_id')
        <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror

    </div>
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del Archivo</h1>

<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
        @else
        <img id="picture" class="w-full h-64 object-cover object-center" src="https://images.pexels.com/photos/357514/pexels-photo-357514.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
         @endisset
    </figure>

    <div>
        <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, vel dicta eius hic autem sequi incidunt tenetur, optio repudiandae possimus mollitia, labore saepe dolorem! Animi officiis molestiae sapiente fugit consectetur!</p>
        {!! Form::file('file', ['class' => 'form-input w-full' . ($errors->has('slug') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}
        @error('file')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
    </div>
</div>