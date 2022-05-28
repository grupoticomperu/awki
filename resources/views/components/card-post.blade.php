@props(['post'])
<article class="mb-8 overflow-hidden bg-white rounded-lg shadow-lg">
    @if($post->image)
        <img class="object-cover object-center w-full h-72" src="{{Storage::url($post->image->url)}}" alt="">    
    @else
     <img class="object-cover object-center w-full h-72" src="https://cdn.pixabay.com/photo/2021/11/13/18/02/lake-6791971_960_720.jpg" alt="">    
    @endif
    

    <div class="px-6 py-4">
        <h1 class="mb-2 text-xl font-bold">
            <a href="{{route('posts.show', $post)}}"> {{ $post->name}}</a>

        </h1>
        <div class="text-base text-gray-700">
            {!! $post->extract !!}
        </div>

    </div>

    <div class="px-6 pt-4 pb-4">
        @foreach ($post->tags as $tag)
            <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 py-1 text-sm text-gray-700 bg-gray-200 rounded-full">{{$tag->name}}</a>
        @endforeach

    </div>


</article>