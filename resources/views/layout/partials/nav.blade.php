<nav class="bg-white py-3 lg:px-3 px-2" >
    <div class="lg:w-8/12 w-full flex justify-between mx-auto ">
        <ul class="flex">
            <li class="p-3 text-xl font-bold  hover:text-gray-700 ">
                <a href="{{ route('posts')}}">Posty</a>
            </li>
            
        </ul>
    
        <ul  class="flex  font-bold ">
            @guest
            <li class="p-3 hover:text-gray-700 ">
                <a href="{{ route('login')}}">login</a>
            </li>
            <li class="p-3 hover:text-gray-700 ">
                <a href="{{ route('register')}}">register</a>
            </li>
            @else
            <li class="p-3 hover:text-gray-700 ">
                <a href="{{route('profile', Auth::user()->username)}}">{{Auth::user()->name}}</a>
            </li>
            <li class="p-3">
            <form action="{{route('logout')}}" method="post" class="inline p-3">
                @csrf
                <button type="submit" class="font-bold hover:text-gray-700 ">Logout</button>
            </form>
            </li>
            @endguest
        </ul>
    </div>
</nav>