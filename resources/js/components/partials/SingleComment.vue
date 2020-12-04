<template>
   <div class="bg-white lg:w-4/5 w-full   my-2  mx-5 rounded">
                        <div class="flex justify-between">
                            <div class="user">
                                <a href="#" class="mb-2 text-sm font-bold">
                                    {{comment.user.name}}
                                </a>
                                <span class="text-xs text-gray-500"> {{ comment.created_at}}</span>
                            </div>
                            <!-- @can('delete-comment' , $comment)
                                <form action="{{route('comments.delete' , $comment->id)}}" method="post" class="inline">
                                    @method("DELETE")
                                    @csrf

                                    <button type="submit" class="text-xs text-white bg-red-600 border-2 px-1 rounded-lg">
                                        delete
                                    </button>

                                </form>
                            @endcan -->
                        </div>

                        <p class="text-sm">
                            {{comment.content}}

                        </p>

                    </div>
</template>

<script>
export default {
    props: ['comment']
}
</script>

<style>

</style>