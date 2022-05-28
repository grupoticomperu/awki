<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese nombre del post']) !!}

    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'Ingrese slug del post', 'readonly']) !!}
    @error('slug')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Categoria:') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    @error('category_id')
      <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
    
    @foreach ($tags as $tag )
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{$tag->name}}
        </label>
        
    @endforeach
    
    @error('tags')
      <small class="text-danger">{{$message}}</small>
    @enderror                   

</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label for="">
       Borrador {!! Form::radio('status', 1, true) !!}
    </label>
    <label for="">
        Publicado{!! Form::radio('status', 2) !!}
    </label>

    @error('status')
    <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="mb-8 row">
    <div class="col-md-8">
        <div class="image-wrapper">
            @isset($post->image)
                <img id="picture" src="{{Storage::url($post->image->url)}}" alt="">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2021/11/13/18/02/lake-6791971_960_720.jpg" alt="">
            @endif
          
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('file', 'Imagen que se va mostrar') !!}
            {!! Form::file('file', ['class'=> 'form-control-file', 'accept'=>'img/*']) !!}
            
        @error('file')
        <span class="text-danger">{{$message}}</span>
        @enderror

        </div>

        <p>aaa ipsum dolor sit amet consectetur adipisicing elit. Voluptas vero aspernatur vitae suscipit id, neque ullam consequuntur delectus, enim obcaecati veniam quis eaque molestiae nulla iusto fugiat reiciendis atque deleniti!</p>
    </div>

    

</div>





<div class="form-group">
    {!! Form::label('extract', 'Extracto') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
    @error('extract')
    <small class="text-danger">{{$message}}</small>
  @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Descripcion del Post') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    @error('body')
    <small class="text-danger">{{$message}}</small>
  @enderror
</div>