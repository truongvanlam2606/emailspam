<footer class="py-8 text-center md:text-left">
    <div class="container mx-auto">
        <div class=" flex flex-col lg:flex-row content-center items-center justify-between">
            <div class="flex items-center flex-col lg:flex-row mx-auto">
                <img src="{{ asset('img/logo.png') }}" class="w-32 lazy" alt="Logo" />
                <span class="ml-0 md:ml-4 text-sm text-gray-600 py-4 lg:py-0">Talk Family, Copyright &copy; 2021</span>
            </div>
            <!-- Start Main Nav Bar -->
            <div class="navbar mx-auto">
                <ul class="navbar-nav flex flex-" style="flex-direction: inherit;">
                    <li class=" px-md-3 px-2">
                        <a class=" text-gray-700 text-sm hover:text-gray-900 transition duration-500 ease-in-out"
                            href="{{ url('') }}/about">About</a>
                    </li>
                    <li class=" px-md-3 px-2">
                        <a class=" text-gray-700 text-sm hover:text-gray-900 transition duration-500 ease-in-out"
                            href="{{ url('') }}/privacy">Privacy</a>
                    </li>
                    <li class=" px-md-3 px-2">
                        <a class=" text-gray-700 text-sm hover:text-gray-900 transition duration-500 ease-in-out"
                            href="{{ url('') }}/terms">Terms and Conditions</a>
                    </li>
                    <li class=" px-md-2 px-2 hidden lg:block">
                        <a class=" text-gray-700 text-sm hover:text-gray-900 transition duration-500 ease-in-out"
                            href="{{ url('') }}/contact">Contact</a>
                    </li>
                    @if (!auth()->user())
                    <li class=" px-md-2 px-2 hidden lg:block">
                        <a class=" text-gray-700 text-sm hover:text-gray-900 transition duration-500 ease-in-out"
                            href="{{ url('') }}/login">Login</a>
                    </li>
                    <li class=" px-md-2 px-2 signup hidden lg:block">
                        <a class="button text-md text-gray-900 px-3 py-2 bg-yellow-500 hover:bg-yellow-600 rounded border border-yellow-600 shadow font-semibold cursor-pointer transition duration-500 ease-in-out"
                            href="{{ url('') }}/talks/start-now">
                            <span class="button__text">Signup for free</span>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- End Main Navbar -->
        </div>
    </div>
    </div>
</footer>
