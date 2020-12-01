@extends('layout.app')

@section('content')
<div class="w-4/12 mx-auto bg-white p-5 my-5 h-full">
    @if ( session('login-failed')) 
        <div class="text-white text-center p-2 mb-3 text-small bg-red-400 w-full  rounded-lg py-2 px-4">
            {{ session('login-failed')}} 
        </div>
        
    @endif
    <form action="{{route('login')}}" method="post">
        @csrf
        
        
        <div class="mb-2">
            <label for="Email" class="sr-only"> Email </label>
            <input type="email" name="email" placeholder="you@examle.com"  value="{{old('email')}}" class="bg-gray-100 w-full border-2 rounded-lg py-2 px-4 @error('email') border-red-400 @enderror">
            @error('email')
            <div class="text-red-400 p-1 text-xs">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="Password" class="sr-only"> Password </label>
            <input type="password" name="password" placeholder="password" class="bg-gray-100 w-full border-2 rounded-lg py-2 px-4 @error('password') border-red-400 @enderror">
            @error('password')
            <div class="text-red-400 p-1 text-xs">
                {{$message}}
            </div>
            @enderror
        </div>
        
        <div class="mb-2 flex justify-center">
            <label for="submit button" class="sr-only"> submit button </label>
            <button type="submit" class="bg-blue-400 text-white  border-2 center rounded-lg py-2 px-6">Login</button>
        </div>
    </form>
</div>
@endsection