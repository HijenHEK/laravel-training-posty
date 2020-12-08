{{-- <single-post :id="{{$post->id}}" :auth="{{Auth::user()->id}}" inline-template> --}}
<div class="bg-white w-full border-2 rounded-lg py-2 px-4 my-2">
    
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
            <button type="submit" class="text-xs text-white bg-red-600 border-2 px-1 rounded-lg">
                delete
            </button>
        </form>
        @endcan
    </div>

    <a href="{{route('posts.show' , $post->id)}}">

        <div>
            {{$post->body}}
        </div>

    </a>
    <div class="flex px-2">
        <div>
        {{-- <like :post="{{$post->id}}" 
            :LikesCount="{{$post->likes->count()}}" 
             /> --}}
            {{-- @auth

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
            </span> --}}
            <a href="{{route('posts.show' , $post->id)}}">

                <span class=" mx-3 px-3 font-bold text-xs">
                    {{$post->comments->count() .' '. Str::plural("comment", $post->comments->count()) }}
                </span>

            </a>

        </div>
    </div>

</div>

{{-- </single-post> --}}