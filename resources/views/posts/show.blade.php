@extends('layout.app')

@section('content')
<div class="lg:w-8/12 w-full mx-auto p-5 my-5 h-full">

    @include('layout.partials.post')




    
    {{-- <form class="bg-white lg:w-4/5 w-full rounded mb-4 mt-7" action="{{route('comments', $post->id)}}" method="POST">
        @csrf
        <div class="flex items-center">
            <textarea name="content" id="content" rows="2"
                class=" text-sm bg-blue-100 @error('content') border-red-400 @enderror mx-5 rounded p-2 border w-full resize-none"></textarea>

            <button type="submit" class="bg-blue-400 py-2 px-3 text-white rounded-lg"> comment</button>
        </div>
                            @error('content')

        <span class=" mx-5 w-full text-red-400 text-sm">{{$message}}</span>
        @enderror
    </form> --}}
        <comment-section :post="{{$post->id}}"  inline-template>
            <div>
                    <form @submit.prevent="addComment()" v-on:keydown="form.onKeydown($event)" class="bg-white lg:w-4/5 w-full rounded mb-4 mt-7">
                    <div class="flex items-center">
                        <textarea v-model="form.content" type="text" name="content"
                            class="text-sm bg-blue-100  mx-5 rounded p-2 border w-full resize-none" :class="{ 'border-red-400': form.errors.has('content') }"></textarea>
                        <button :disabled="form.busy || form.errors.has('content')" type="submit" class="bg-blue-400 py-2 px-3 text-white rounded-lg "  :class="{'opacity-50' :  form.errors.has('content') }"> Comment </button>
                    </div>
                
                    @error('content')
                    <span class=" mx-5 w-full text-red-400 text-sm">{{form.errors.get('content')}}</span>
                    @enderror

                    
                
                </form>
              <comment-list v-on:delete-comment="deleteComment"  :comments="comments" :auth="{{auth()->user()->id}}"/>
    
            </div>
    
        </comment-section>
    


    {{-- @foreach ($comments as $comment)

    @include('layout.partials.comment')


    @endforeach --}}


</div>

@endsection
