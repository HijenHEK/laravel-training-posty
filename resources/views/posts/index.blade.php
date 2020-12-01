@extends('layout.app')

@section('content')
<div class="w-8/12 mx-auto bg-white p-5 my-5 h-full">
    @auth
    <form action="{{route('posts')}}" method="post">
        @csrf
        
        
        <div class="mb-2">
            <label for="Post body" class="sr-only"> Post body </label>

            <textarea  name="body" cols="40" rows="4" placeholder="write your post"  
            value="{{old('body')}}" 
            class="bg-gray-100 w-full border-2 rounded-lg py-2 px-4 
            @error('body') border-red-400 @enderror"></textarea>

            @error('body')
            <div class="text-red-400 p-1 text-xs">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <div class="mb-1 px-5 flex justify-end">
            <label for="submit button" class="sr-only"> submit button </label>
            <button type="submit" class="bg-blue-400 text-white  border-2 center rounded-lg py-2 px-6">Post it</button>
        </div>
    </form>

    @endauth
    
    <div class="mt-5">
        @if($posts->count())
            @foreach ($posts as $post)
                <div class="bg-white w-full border-2 rounded-lg py-2 px-4 my-2">
                    <a class="mb-2 font-bold">
                    {{$post->user->name}} 
                    </a>
                    <span class="text-xs text-gray-500"> {{ $post->created_at->diffForHumans()}}</span>
                    <p>
                        {{$post->body}}

                    </p>
                        @auth
                        <form action="{{route('like',$post->id)}}" method="post" class="inline">
                            @csrf

                            @if (Auth::user()->like($post))
                                @method("DELETE")
                            @endif

                            <button type="submit" class="text-xs text-gray-700 border-2 px-1 rounded-lg"> 
                                {{Auth::user()->like($post) ? 'Unlike' : 'Like'}} 
                            </button>
                        </form>
                        @endauth
                        
                        <span class=" font-bold text-xs @auth  @if (Auth::user()->like($post)) text-blue-700 @endif @endauth">
                            {{$post->likes->count() .' '. Str::plural("like", $post->likes->count()) }}
                        </span>
                        
                </div>
            @endforeach
            <div class=" py-2 px-4 my-2">
                {{$posts->links()}}
            </div>
        @else
        
            <p class="text-xs text-gray-500">
                there is no posts yet !
            </p>
        @endif

        
    </div>
</div>
@endsection