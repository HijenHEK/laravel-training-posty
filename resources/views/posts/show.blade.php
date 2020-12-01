@extends('layout.app')

@section('content')
<div class="w-8/12 mx-auto bg-white p-5 my-5 h-full">

<div class="bg-white w-full  py-2 px-4 my-2">
    <a href="{{route('profile' , $post->user->username)}}" class="mb-2 font-bold">
        {{$post->user->name}}
    </a>
    <span class="text-xs text-gray-500"> {{ $post->created_at->diffForHumans()}}</span>
    <p>
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

                <button type="submit" class="text-xs text-gray-700 border-2 px-1 rounded-lg">
                    {{Auth::user()->like($post) ? 'Unlike' : 'Like'}}
                </button>
            </form>
            @endauth

            <span
                class=" font-bold text-xs @auth  @if (Auth::user()->like($post)) text-blue-700 @endif @endauth">
                {{$post->likes->count() .' '. Str::plural("like", $post->likes->count()) }}
            </span>

        </div>
        @can('delete' , $post)
        <form action="{{route('posts.delete' , $post->id)}}" method="post" class="inline">
            @method("DELETE")
            @csrf
            <button type="submit" class="text-xs text-white bg-red-600 border-2 px-1 rounded-lg">
                delete
            </button>
        </form>
        @endcan
    </div>

</div>

</div>

@endsection