@extends('layout.app')

@section('content')
<div class="lg:w-8/12 w-full mx-auto p-5 my-5 h-full">

    <div class="bg-white w-full  py-2 px-4 my-2 rounded">
        <div class="flex justify-between ">
            <div class="user">
                <a href="{{route('profile' , $post->user->username)}}" class="mb-2 font-bold">
                    {{$post->user->name}}
                </a>
                <span class="text-xs text-gray-500"> {{ $post->created_at->diffForHumans()}}</span>
            </div>
            @can('delete-post' , $post)
            <form action="{{route('posts.delete' , $post->id)}}" method="post" class="inline">
                @method("DELETE")
                @csrf

                <button type="submit" class="text-sm text-white bg-red-600 border-2 px-1 rounded-lg">
                    delete
                </button>

            </form>
            @endcan
        </div>
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

                <span class=" font-bold text-sm @auth  @if (Auth::user()->like($post)) text-blue-700 @endif @endauth">
                    {{$post->likes->count() .' '. Str::plural("like", $post->likes->count()) }}
                </span>

            </div>

        </div>

    </div>

    <form class="bg-white lg:w-4/5 w-full rounded mb-4 mt-7" action="{{route('comments', $post->id)}}" method="POST">
        @csrf
        <div class="flex items-center">
            <textarea name="content" id="content" rows="2"
                class=" text-sm bg-blue-100 @error('content') border-red-400 @enderror mx-5 rounded p-2 border w-full resize-none"></textarea>

            <button type="submit" class="bg-blue-400 py-2 px-3 text-white rounded-lg"> comment</button>
        </div>
        @error('content')
        <span class=" mx-5 w-full text-red-400 text-sm">{{$message}}</span>
        @enderror
    </form>


    @foreach ($post->comments as $comment)

    <div class="bg-white lg:w-4/5 w-full   my-2  mx-5 rounded">
        <div class="flex justify-between">
            <div class="user">
                <a href="{{route('profile' , $comment->user->username)}}" class="mb-2 text-sm font-bold">
                    {{$comment->user->name}}
                </a>
                <span class="text-xs text-gray-500"> {{ $comment->created_at->diffForHumans()}}</span>
            </div>
            @can('delete-comment' , $comment)
                <form action="{{route('comments.delete' , $comment->id)}}" method="post" class="inline">
                    @method("DELETE")
                    @csrf

                    <button type="submit" class="text-xs text-white bg-red-600 border-2 px-1 rounded-lg">
                        delete
                    </button>

                </form>
            @endcan
        </div>

        <p class="text-sm">
            {{$comment->content}}

        </p>

    </div>


    @endforeach

</div>

@endsection
