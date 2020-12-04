@extends('layout.app')

@section('content')
<div class="w-8/12 mx-auto bg-white p-5 my-5 h-full">
<div class="w-full flex justify-between">

    <h1 class="font-bold">
        {{$user->name}}
    </h1> 
        
    @can('follow' , $user)
        <form action="{{route('follow' , $user)}}" method="POST">
            @csrf
            <button type="submit" class="px-3 py-1 bg-blue-300 text-white hover:bg-blue-500 rounded-lg "> Follow </button>
        </form>
    @elsecan('unfollow' , $user)

        <form action="{{route('follow' , $user)}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="px-3 py-1 bg-gray-300 text-white hover:bg-red-500 rounded-lg "> unFollow </button>
        </form>
    @endcan

        


</div>

<div > 
    <span class="text-sm text-blue-500">
        {{ $user->followers->count() .' '.Str::plural('Follower' , $user->followers->count() )}}</span>

    </span>
    <span class="text-xs">
        <span class="text-gray-500">Posted</span>  
        {{ $posts->count() .' '.Str::plural('post' ,$posts->count())}}</span>
    <span class="text-xs">
        <span  class="text-gray-500">and recieved </span>
        {{ $user->recievedLikes->count().' '. Str::plural('like' ,$user->recievedLikes->count())}}</span>
</div>
</div>
<div class="w-8/12 mx-auto bg-white p-5 my-5 h-full">
    @auth

    @if(Auth::user()->is($user))
    <form action="{{route('posts')}}" method="post">
        @csrf


        <div class="mb-2">
            <label for="Post body" class="sr-only"> Post body </label>

            <textarea name="body" cols="40" rows="4" placeholder="write your post" value="{{old('body')}}" class="bg-gray-100 w-full border-2 rounded-lg py-2 px-4 
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

    @endif
    @endauth
    <div class="mt-5">
        @if($posts->count())

        @foreach ($posts as $post)
        <div class="bg-white w-full border-2 rounded-lg py-2 px-4 my-2">
        
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
