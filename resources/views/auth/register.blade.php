@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <div class="w-full  fade-in fade-in-first">
        <div class="w-full max-w-lg mx-auto mt-32">
            <div class="bg-white rounded-lg shadow p-8 text-center">
                <h1 class="text-2xl font-semibold">Create an account</h1>
                <div class="my-4">
                    <input class="bg-gray-200 rounded shadow-inner w-full h-12 p-4 mb-4" placeholder="Name">
                    <input class="bg-gray-200 rounded shadow-inner w-full h-12 p-4 mb-4" placeholder="Email">
                    <input class="bg-gray-200 rounded shadow-inner w-full h-12 p-4 mb-4" placeholder="Create Password">
                    <button class="bg-yellow-500 rounded p-4 border border-yellow-600 block w-full font-semibold">Create
                        account</button>
                </div>
                <div class="mt-8">
                    <hr class="bg-gray-300 w-full" />
                    <span class="font-semibold bg-white px-2 -mt-2 w-12 relative text-gray-600" style="top:-12px">OR</span>
                </div>
                <div class="my-4">
                    <button
                        class="bg-yellow-500 rounded p-4 block w-full font-semibold flex justify-center items-center content-center text-white mb-2"
                        style="background:#4385F5;">
                        <div class="bg-white rounded p-1 mr-2">
                            <img src="img/logos/google.png" width="24" height="24">
                        </div>
                        Sign up with Google
                    </button>
                    <button
                        class="bg-yellow-500 rounded p-4 block w-full font-semibold flex justify-center items-center content-center text-white"
                        style="background:#3B5A99;">
                        <div class="bg-white rounded p-1 mr-2">
                            <img src="img/logos/facebook.png" width="24" height="24">
                        </div>
                        Sign up with Facebook
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
