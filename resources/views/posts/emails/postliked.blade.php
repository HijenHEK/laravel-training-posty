@component('mail::message')
# Someone Liked one of your posts !

{{ $liker->name }} just liked your post :

@component('mail::button', ['url' => route('posts.show' , $post->id)])
Visit post
@endcomponent


{{ config('app.name') }}
@endcomponent
