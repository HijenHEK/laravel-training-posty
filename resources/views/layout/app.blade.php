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
                <a href="/">Posts</a>
            </li>
            <li class="p-3">
                <a href="/dash">dashboard</a>
            </li>
        </ul>

        <ul  class="flex">
            <li class="p-3">
                <a href="/">Login</a>
            </li>
            <li class="p-3">
                <a href="/dash">Register</a>
            </li>
            <li class="p-3">
                <a href="/dash">Profile</a>
            </li>
        </ul>
    </nav>
    


    <div class="w-8/12 mx-auto bg-white p-5 my-5 h-full">



        @yield('content')
    </div>



</body>
</html>