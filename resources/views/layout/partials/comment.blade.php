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