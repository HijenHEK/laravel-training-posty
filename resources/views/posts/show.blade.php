@extends('layout.app')

@section('content')
<div class="lg:w-8/12 w-full mx-auto p-5 my-5 h-full">

    @include('layout.partials.post')




    
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


    @foreach ($comments as $comment)

    @include('layout.partials.comment')


    @endforeach


</div>

@endsection
