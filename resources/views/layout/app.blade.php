<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Posty</title>
</head>
<body class="bg-gray-100">
    
    <nav class="bg-white flex justify-between py-3 px-10">
        <ul class="flex">
            <li class="p-3">
                <a href="{{ route('Posts')}}">Posts</a>
            </li>
            @auth
            <li class="p-3">
                <a href="#">Dashboard</a>
            </li>
            @endauth
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
                <a href="#">Profile</a>
            </li>
            <li class="p-3">
            {{-- <form action="{{route('logout')}}" method="post">
                <input type="submit" value="Logout">
            </form> --}}
            </li>
            @endguest
        </ul>
    </nav>
    





        @yield('content')



</body>
</html>