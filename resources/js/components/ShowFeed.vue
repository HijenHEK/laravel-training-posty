<template>
  

  <div class="lg:w-8/12 w-full mx-auto bg-white p-5 my-5 h-full">
    <!-- @auth
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

    @endauth -->

    <div class="mt-5">
        <!-- @if($posts->count())

        @foreach ($posts as $post)
            @include('layout.partials.post')
        @endforeach -->

        <single-post />

        <!-- <div class=" py-2 px-4 my-2">
            {{$posts->links()}}
        </div>
        @else

        <p class="text-xs text-gray-500">
            there is no posts yet !
        </p>
        @endif -->


    </div>
</div>


</template>

<script>
import SinglePost from './partials/SinglePost.vue'
export default {
  components: { SinglePost },

}
</script>

<style>

</style>