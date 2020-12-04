@extends('layout.app')

@section('content')
<div class="w-8/12 mx-auto p-5 my-5 h-full">

<div class="bg-white w-full  py-2 px-4 my-2">
    <a href="{{route('profile' , $post->user->username)}}" class="mb-2 text-lg font-bold">
        {{$post->user->name}}
    </a>
    <span class="text-sm text-gray-500"> {{ $post->created_at->diffForHumans()}}</span>
    <p class=>
        {{$post->body}}

    </p>
    <div class="flex justify-between px-2">
        <div>
            @auth
            <form action="{{route('like',$post->id)}}" method="post" class="inline">
                @csrf

                @if (Auth::user()->like($post))
                @method("DELETE")
                @endif

                <button type="submit" class="text-sm text-gray-700 border-2 px-1 rounded-lg">
                    {{Auth::user()->like($post) ? 'Unlike' : 'Like'}}
                </button>
            </form>
            @endauth

            <span
                class=" font-bold text-sm @auth  @if (Auth::user()->like($post)) text-blue-700 @endif @endauth">
                {{$post->likes->count() .' '. Str::plural("like", $post->likes->count()) }}
            </span>

        </div>
        @can('delete' , $post)
        <form action="{{route('posts.delete' , $post->id)}}" method="post" class="inline">
            @method("DELETE")
            @csrf
            <button type="submit" class="text-sm text-white bg-red-600 border-2 px-1 rounded-lg">
                delete
            </button>
        </form>
        @endcan
    </div>

</div>

    @foreach ($post->comments as $comment)
        
        <div class="bg-white w-full  my-2 p-3 mx-5">

            <a href="{{route('profile' , $comment->user->username)}}" class="mb-2 text-sm font-bold">
                {{$comment->user->name}}
            </a>
            <span class="text-xs text-gray-500"> {{ $comment->created_at->diffForHumans()}}</span>
            <p class="text-sm">
                {{$comment->content}}

            </p>

        </div>


    @endforeach

</div>

@endsection