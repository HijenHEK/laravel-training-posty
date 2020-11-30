@extends('layout.app')

@section('content')
<div class="w-4/12 mx-auto bg-white p-5 my-5 h-full">
    <form action="{{route('Register')}}" method="post">
        @csrf
        <div class="mb-4">
            <label for="Name" class="sr-only"> Name </label>
        <input type="text" name="name" placeholder="Your name" value="{{old('name')}}" class="bg-gray-100 w-full border-2 rounded-lg p-4 @error('name') border-red-400 @enderror">
            @error('name')
                <div class="text-red-400 p-2 text-small">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="Username" class="sr-only"> Username </label>
            <input type="text" name="username" placeholder="Username"  value="{{old('username')}}" class="bg-gray-100 w-full border-2 rounded-lg p-4 @error('username') border-red-400 @enderror">
            @error('username')
            <div class="text-red-400 p-2 text-small">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="Email" class="sr-only"> Email </label>
            <input type="email" name="email" placeholder="you@examle.com"  value="{{old('email')}}" class="bg-gray-100 w-full border-2 rounded-lg p-4 @error('email') border-red-400 @enderror">
            @error('email')
            <div class="text-red-400 p-2 text-small">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="Password" class="sr-only"> Password </label>
            <input type="password" name="password" placeholder="password" class="bg-gray-100 w-full border-2 rounded-lg p-4 @error('password') border-red-400 @enderror">
            @error('password')
            <div class="text-red-400 p-2 text-small">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password confirmation" class="sr-only"> password confirmation </label>
            <input type="password" name="password_confirmation" placeholder="password repeat" class="bg-gray-100 w-full border-2 rounded-lg p-4 @error('password_confirmation') border-red-400 @enderror">
            @error('password_confirmation')
            <div class="text-red-400 p-2 text-small">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="submit button" class="sr-only"> submit button </label>
            <button type="submit" class="bg-blue-400 text-white w-full  border-2 mx-auto rounded-lg py-3 px-4">Register</button>
        </div>
    </form>
</div>
@endsection