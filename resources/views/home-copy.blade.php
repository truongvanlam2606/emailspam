<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
    <link rel="stylesheet" href="{{ url('') }}/css/app_home.css">
    <title>Talk - Family - Home</title>
    <meta name="description"
        content="Talk Family is an app that helps to improve communication between parents and children." />
</head>

<body class="antialiased overflow-hidden overflow-y-scroll">
    <div class="hero w-full ">
        <nav class="p-4 nav-section w-full">
            <div class="container mx-auto">
                <div class="flex justify-between flex- content-center items-center py-2 lg:py-0 px-0 lg:px-0">
                    <a href="{{ url('') }}">
                        <img src="img/logo.png" class="w-32 self-start" alt="Logo" />
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
                        </ul>
                    </div>
                    <!-- End Secondary Navbar -->

                    <!-- Start Mobile Navbar-->
                    <div class="hamburger-menu px-2 py-1 block md:hidden rounded border border-gray-500 uppercase">
                        Menu
                    </div>
                    <div
                        class="navbar mobile-nav px-0 mx-0 hidden md:hidden fixed top-0 left-0 w-full bg-white h-screen fixed z-50 p-3">
                        <div class="flex flex- justify-between px-3 py-2">
                            <img src="img/logo.png" class="w-32 self-start ml-1" />
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
                                    href="{{ url('') }}/login">Login</a>
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
        <div class="container mx-auto mt-8 ">
            <!-- Start Hero Content -->
            <div class="py-8 md:py-16 hero__content text-center w-4/5 mx-auto fade-in fade-in-first">
                <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold leading-tight">Is your child happy?</h1>
                <p class="text-xl pt-4 pb-8 text-gray-700">Measure what is most important and prevent problems at the
                    right time!</p>
                <div class="flex justify-center items-center flex-col">
                    <a href="{{ url('') }}/talks/start-now"
                        class="button bg-yellow-500 hover:bg-yellow-600 rounded border border-yellow-600 shadow font-semibold px-6 py-2 inline-block transition duration-500 ease-in-out cursor-pointer text-xl"
                        disabled="true">
                        <span class="button__text">Free Signup</span>
                    </a>
                </div>
            </div>
            <!-- End Hero Content -->
        </div>
        <!-- End Hero Content -->
    </div>

    <div class="border-t border-b border-blue-200 py-16 bg-blue-100 my-16 px-4" id="track">
        <div class="container mx-auto">
            <div class="mb-8">
                <div class="w-full lg:w-8/12 text-center mx-auto">
                    <h2 class="text-2xl md:text-4xl leading-tight font-bold">Most child suicides are preventable</h2>
                    <p class="text-lg py-2 text-gray-700">Parents of children who succumb to pressure wish they had
                        known what their child was feeling. Talk Family is a simple communication channel that
                        encourages your child to talk openly and freely.</p>
                </div>
            </div>
            <div class="my-16 lg:flex">

                <div
                    class="my-8 lg:my-0 w-full lg:w-2/6 text-center mt-4 flex flex-col justify-between align-content-start px-4">
                    <img src="img/alarm.png"
                        class="lg:w-1/3 lazy self-start mx-auto py-2 md:py-4 w-1/2 md:w-1/3 lg:w-auto"
                        alt="Weekly reminders" />
                    <div>
                        <h3 class="font-semibold text-xl md:text-2xl lg:text-xl">Don't leave it to chance</h3>
                        <p class="text-gray-600">Our app will send a weekly reminder to you and your child to talk
                            about everything that is important.</p>
                    </div>
                </div>

                <div
                    class="my-8 lg:my-0 w-full lg:w-2/6 text-center mt-4  flex flex-col align-content-start justify-between px-4">
                    <img src="img/monitor.png"
                        class="lg:w-1/3 lazy self-start mx-auto py-2 md:py-4 w-1/2 md:w-1/3 lg:w-auto"
                        alt="Monitor and track" />
                    <div>
                        <h3 class="font-semibold text-xl md:text-2xl lg:text-xl">Monitor and Track</h3>
                        <p class="text-gray-600">You will be able to track how your child is dealing with any issues
                            and proactively help and support her.</p>
                    </div>
                </div>

                <div
                    class="my-8 lg:my-0 w-full lg:w-2/6 text-center mt-4  flex flex-col align-content-start justify-between px-4">
                    <img src="img/child.png"
                        class="lg:w-1/3 lazy self-start mx-auto py-2 md:py-4 w-1/2 md:w-1/3 lg:w-auto"
                        alt="Support your child" />
                    <h3 class="font-semibold text-xl md:text-2xl lg:text-xl">Take steps</h3>
                    <p class="text-gray-600">Most importantly this open communication will help you address the
                        concerns before they become major issues.</p>
                </div>
            </div>

            <div class=" mt-4">
                <div class="lg:w-1/2 mx-auto text-center mt-4">
                    <blockquote class="italic text-lg text-gray-700">
                        “At the end of the day, the most overwhelming key to a child's success is the positive
                        involvement of parents."
                    </blockquote>
                    <div class="mt-3 flex justify-center content-center items-center">
                        <img src="img/jane.png" class="w-8 lazy self-start" alt="Testimonial Avatar" />
                        <span class="ml-2 font-bold text-gray-900">Jane D Hull, American Politican and Educator</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Features Block -->
    <div class="features px-4 md:px-8" id="better">
        <div class="container mx-auto">

            <!-- Start Features -->
            <div class="flex flex-col md:flex-row items-center content-center py-12 lg:pt-16 lg:pb-32">
                <!-- Start Feature Image -->
                <div class="md:w-1/2 text-center mb-4 lg:mb-0 relative">
                    <img src="img/device-mobile.png" class="lazy mx-auto z-10 relative w-2/3 md:w-2/5 lg:w-1/3"
                        alt="Mobile Device" />

                </div>
                <!-- End Feature Image -->

                <!-- Start Feature Content -->
                <div class="w-full md:w-1/2 ">
                    <h2 class="text-xl md:text-2xl lg:text-3xl font-semibold">Give your child the freedom to talk!</h2>
                    <p class="text-md lg:text-lg pt-4 pb-8 text-gray-700">
                        Personal communication and expression can be confusing for a child. Talk.Family makes it simple
                        for the child to convey complex issues to parents.
                    </p>
                    <ul class="usps">
                        <li class="text-gray-900 py-1">Weekly reviews</li>
                        <li class="text-gray-900 py-1">Analysis and tracking of child's responses</li>
                        <li class="text-gray-900 py-1">Recommendations for improvement</li>
                    </ul>
                </div>
                <!-- End Feature Content -->
            </div>
            <!-- End Feature -->
        </div>
    </div>
    <!-- End Features Block -->


    <!-- Start CTA Block -->
    <div class="bg-yellow-100 py-16 border-t border-yellow-300 px-4 md:px-16 lg:px-0">
        <div class="container mx-auto py-4">
            <!-- Start Image -->
            <div class=" py-4">
                <div class="lg:w-3/12 col-md-4 mx-auto text-center">
                    <img src="img/daughter.png" class="lazy mx-auto w-100 w-1/2 lg:w-full" alt="Make time for family" />
                </div>
            </div>
            <!-- End Image -->

            <!-- Start Content -->
            <div class="">
                <div class="lg:w-3/6 mx-auto text-center">
                    <h2 class="text-2xl md:text-4xl lg:text-4xl font-bold">Make time for what's important!</h2>
                    <p class="text-md md:text-xl lg:text-lg pt-4 pb-8 text-gray-800">A safe space where you and your
                        child can talk about the things that make all the difference!</p>
                    <div class="flex justify-center items-center flex- mb-2">
                        <a
                            class="button bg-yellow-500 hover:bg-yellow-600 rounded border border-yellow-600 hover:border-yellow-700 shadow font-semibold px-4 py-2 inline-block mx-2 cursor-pointer transition duration-500 ease-in-out">
                            <span class="button__text">FREE Signup</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Content -->

            <!-- Start Testimonial -->
            <div class=" mt-8 ">
                <div class="lg:w-1/2 mx-auto mt-4 text-center ">
                    <blockquote class="text-gray-700 italic text-sm  lg:text-lg">
                        “It is easier to build strong children than to repair broken men. "
                    </blockquote>
                    <div class="mt-3 flex justify-center content-center items-center">
                        <img src="img/doughlass.jpeg" class="w-8 lazy self-start" alt="Frederick Douglass" />
                        <span class="ml-2 font-bold text-gray-900">Frederick Douglass, Social reformer</span>
                    </div>
                </div>
            </div>
            <!-- End Testimonial -->
        </div>
    </div>
    <!-- End CTA Block -->

    <footer class="py-8 text-center md:text-left">
        <div class="container mx-auto">
            <div class=" flex flex-col lg:flex-row content-center items-center justify-between">
                <div class="flex items-center flex-col lg:flex-row mx-auto">
                    <img src="img/logo.png" class="w-32 lazy" alt="Logo" />
                    <span class="ml-0 md:ml-4 text-sm text-gray-600 py-4 lg:py-0">Talk Family, Copyright &copy;
                        2021</span>
                </div>
                <!-- Start Main Nav Bar -->
                <div class="navbar mx-auto">
                    <ul class="navbar-nav flex flex-">
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
                    </ul>
                </div>
                <!-- End Main Navbar -->
            </div>
        </div>
        </div>
    </footer>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ url('') }}/js/vendor/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@15.1.1/dist/lazyload.min.js"></script>
    <!-- build:js -->
    <script src="{{ url('') }}/js/app_home.js"></script>
    <script src="{{ url('') }}/js/button-loading.js"></script>
    <!-- endbuild -->
</body>

</html>
