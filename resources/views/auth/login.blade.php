@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <div class="w-full  fade-in fade-in-first">
        <div class="w-full max-w-lg mx-auto mt-32">
            <div class="bg-white rounded-lg shadow p-8 text-center">
                <h1 class="text-2xl font-semibold">Welcome Back</h1>
                <div class="my-4">
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <input name="email" type="email" required class="bg-gray-200 rounded shadow-inner w-full h-12 p-4 mb-4" placeholder="Email">
                        <input name="password" type="password" required class="bg-gray-200 rounded shadow-inner w-full h-12 p-4 mb-4" placeholder="Password">
                        <div class="text-left mb-4">
                            <input id="remember" type="checkbox" value="remember">&nbsp;&nbsp;<label
                                for="remember">Remember me</label>
                        </div>
                        <button
                            class="bg-yellow-500 rounded p-4 border border-yellow-600 block w-full font-semibold">Signin</button>
                    </form>
                </div>
                <div class="flex justify-between">
                    <a href="#" class="text-blue-500 text-sm text-center">Forgot your password?</a>
                    <a href="/register" class="text-blue-500 text-sm text-center">Don't have an account?</a>
                </div>
                <div class="my-4">
                    <button
                        class="bg-yellow-500 rounded p-4 block w-full font-semibold flex justify-center items-center content-center text-white mb-2"
                        style="background:#4385F5;">
                        <div class="bg-white rounded p-1 mr-2">
                            <img src="img/logos/google.png" width="24" height="24">
                        </div>
                        Sign in with Google
                    </button>
                    <button
                        class="bg-yellow-500 rounded p-4 block w-full font-semibold flex justify-center items-center content-center text-white"
                        style="background:#3B5A99;">
                        <div class="bg-white rounded p-1 mr-2">
                            <img src="img/logos/facebook.png" width="24" height="24">
                        </div>
                        Sign in with Facebook
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
