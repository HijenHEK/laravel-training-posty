<nav class="bg-white flex justify-between py-3 px-10">
    <ul class="flex">
        <li class="p-3">
            <a href="{{ route('posts')}}">Posts</a>
        </li>
        
    </ul>

    <ul  class="flex">
        @guest
        <li class="p-3">
            <a href="{{ route('login')}}">login</a>
        </li>
        <li class="p-3">
            <a href="{{ route('register')}}">register</a>
        </li>
        @else
        <li class="p-3">
            <a href="{{route('profile', Auth::user()->username)}}">{{Auth::user()->name}}</a>
        </li>
        <li class="p-3">
        <form action="{{route('logout')}}" method="post" class="inline p-3">
            @csrf
            <button type="submit">Logout</button>
        </form>
        </li>
        @endguest
    </ul>
</nav>