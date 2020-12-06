@extends('layout.app')

@section('content')



<user-profile :userid="{{$user->id}}" inline-template>

    <div>

        
        <div class="lg:w-8/12 w-full$ mx-auto bg-white p-5 my-5 h-full">
            <div class="w-full flex justify-between">
                
                <h1 class="font-bold">
                    {{$user->name}}
                </h1>
                
                @can('follow' , $user)
        <form action="{{route('follow' , $user)}}" method="POST">
            @csrf
            <button type="submit" class="px-3 py-1 bg-blue-300 text-white hover:bg-blue-500 rounded-lg "> Follow
            </button>
        </form>
        @elsecan('unfollow' , $user)

        <form action="{{route('follow' , $user)}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="px-3 py-1 bg-gray-300 text-white hover:bg-red-500 rounded-lg "> unFollow
            </button>
        </form>
        @endcan




    </div>

    <div>
        <span class="text-sm text-blue-500">
            
            @{{user.followers}} Followers

        </span>
        <span class="text-xs">
            <span class="text-gray-500">Posted</span>
            @{{user.posts}}

        <span class="text-xs">
            <span class="text-gray-500">and recieved </span>
            @{{user.likes}}
    </div>
</div>
    
<posts-section @userupdate="getUser()" :user="{{$user->id}}" :isuser="{{Auth::user()->is($user) ?  'true' : 'false' }}" inline-template>

        
        <div class="lg:w-8/12 w-full mx-auto bg-white p-5 my-5 h-full">
            @auth
            

                
            <form v-if="isuser" @submit.prevent="isuser ? addPost() : '' " v-on:keydown="form.onKeydown($event)">
                            
                <div class="mb-2">
                    <label for="Post body" class="sr-only"> Post body </label>
                    
                    <textarea name="body" v-model="form.body" cols="40" rows="4" placeholder="write your post" value="{{old('body')}}" class="bg-gray-100 w-full border-2 rounded-lg py-2 px-4 
                    @error('body') border-red-400 @enderror" :class="{' border-red-400' : form.errors.has('body')}"></textarea>
                    
                    @error('body')
                    <div class="text-red-400 p-1 text-xs">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                
                <div class="mb-1 px-5 flex justify-end">
                    <label for="submit button" class="sr-only"> submit button </label>

                    <button :disabled="form.busy || form.errors.has('body')" type="submit" 
                    class="bg-blue-400 text-white  border-2 center rounded-lg py-2 px-6 "
                    :class="{'opacity-50' :  form.errors.has('body') }">Post it</button>
                </div>
            </form>
            
            
            @endauth
            
            
            {{-- @foreach ($posts as $post)
                        @include('layout.partials.post')
                        @endforeach
                        <div class=" py-2 px-4 my-2">
                            {{$posts->links()}}
                            
                        </div>
                        
                        @else
                        --}}
            <posts-list @userupdate="userupdate()" :posts="posts" />
                
                
                    
                
                </div>

    </posts-section>
</div>

</user-profile>

{{-- <div class="lg:w-8/12 w-full mx-auto bg-white p-5 my-5 h-full">
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
        @include('layout.partials.post')
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
</div> --}}
@endsection
