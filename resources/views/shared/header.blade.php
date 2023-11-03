@php
    $user = auth()->user();
@endphp
<nav class="p-4 nav-section w-full">
    <div class="container mx-auto">
        <div class="flex justify-between flex- content-center items-center py-2 lg:py-0 px-0 lg:px-0">
            <a href="{{ url('') }}">
                <img src="{{ asset('img/logo.png') }}" class="w-32 self-start" alt="Logo" />
            </a>
            <!-- End Logo -->

            <!-- Start Main Nav Bar -->
            <div class="hidden md:block">
                <ul class="flex flex-row">
                    <li>
                        <a class="px-4 py-2 text-gray-900 font-semibold" href="{{ url('') }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a class="px-4 py-2 text-gray-700 hover:text-gray-900 transition duration-500 ease-in-out hover:rounded hover:bg-gray-200 rounded"
                            href="{{ url('') }}/#track">
                            Talk and Track
                        </a>
                    </li>
                    <li>
                        <a class="px-4 py-2 text-gray-700 hover:text-gray-900 transition duration-500 ease-in-out hover:rounded hover:bg-gray-200 rounded"
                            href="{{ url('') }}/#better">
                            Better Future
                        </a>
                    </li>
                    <li>
                        <a class="px-4 py-2 text-gray-700 hover:text-gray-900 transition duration-500 ease-in-out hover:rounded hover:bg-gray-200 rounded"
                            href="{{ url('') }}/about">
                            About
                        </a>
                    </li>
                    <li>
                        <a class="px-4 py-2 text-gray-700 hover:text-gray-900 transition duration-500 ease-in-out hover:rounded hover:bg-gray-200 rounded"
                            href="{{ url('') }}/contact">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Main Navbar -->

            <!-- End Secondary Navbar -->
            <div class="hidden md:block">
                <ul class="flex flex-">
                    @if ($user)
                        <li>
                            <a class="px-4 py-2 text-gray-700 hover:text-gray-900 transition duration-500 ease-in-out hover:rounded hover:bg-gray-200 rounded text-gray-900"
                                href="{{route('student.index')}}">Hi, {{$user->name}}</a>
                        </li>
                        <li class="nav-item px-2 signup">
                            <a class="button text-gray-900 px-3 py-2 bg-yellow-500 hover:bg-yellow-600 rounded border border-yellow-600 shadow font-semibold transition duration-500 ease-in-out cursor-pointer"
                                href="{{route('logout')}}">
                                <span class="button__text">Logout</span>
                            </a>
                        </li>
                    @else
                        <li>
                            <a class="px-4 py-2 text-gray-700 hover:text-gray-900 transition duration-500 ease-in-out hover:rounded hover:bg-gray-200 rounded text-gray-900"
                                href="{{ url('') }}/login">Login</a>
                        </li>
                        <li class="nav-item px-2 signup">
                            <a class="button text-gray-900 px-3 py-2 bg-yellow-500 hover:bg-yellow-600 rounded border border-yellow-600 shadow font-semibold transition duration-500 ease-in-out cursor-pointer"
                                href="{{ url('') }}/talks/start-now">
                                <span class="button__text">Signup for free</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
            <!-- End Secondary Navbar -->

            <!-- Start Mobile Navbar-->
            <div class="hamburger-menu px-2 py-1 block md:hidden rounded border border-gray-500 uppercase d-md-none">
                Menu
            </div>
            <div
                class="navbar mobile-nav px-0 mx-0 hidden md:hidden fixed top-0 left-0 w-full bg-white h-screen fixed z-50 p-3 d-md-none">
                <div class="flex flex- justify-between px-3 py-2">
                    <img src="{{ asset('img/logo.png') }}" class="w-32 self-start ml-1" />
                    <div
                        class="close-menu flex items-center content-center justify-center px-2 py-1 bg-black rounded px-x py-1 text-white uppercase">
                        Close
                    </div>
                </div>
                <ul class="flex flex-col text-center mt-2 pt-2 w-full">
                    <li class="w-full">
                        <a class="w-full text-lg border-t border-gray-200 block py-3"
                            href="{{ url('') }}">Home</a>
                    </li>
                    <li class="w-full">
                        <a class="w-full text-lg border-t border-gray-200 block py-3"
                            href="{{ url('') }}/#track">Talk and Track</a>
                    </li>
                    <li class="w-full">
                        <a class="w-full text-lg border-t border-gray-200 block py-3"
                            href="{{ url('') }}/#better">Better future</a>
                    </li>
                    <li class="w-full">
                        <a class="w-full text-lg border-t border-gray-200 block py-3"
                            href="{{ url('') }}/about">About</a>
                    </li>
                    <li class="w-full">
                        <a class="w-full text-lg border-t border-gray-200 block py-3"
                            href="{{ url('') }}/contact">Contact</a>
                    </li>
                    <li class="w-full">
                        <a class="w-full text-lg border-t border-gray-200 block py-3"
                            href="{{ url('') }}/login">Logins</a>
                    </li>
                    <li class="signup py-4 border-t border-gray-200 p-4">
                        <a class=" px-3 py-2 bg-yellow-500 rounded border border-yellow-600 shadow font-semibold block"
                            href="{{ url('') }}/talks/start-now">Signup for free</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- End Nav -->
