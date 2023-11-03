
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />

  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
  <link rel="stylesheet" href="{{ url('') }}/css/app_home.css">
  {{-- <title>Talk - Family - Home</title> --}}
  <title>@yield('title')</title>
  <meta name="description" content=""/>

  @stack('css')

</head>
<body class="antialiased overflow-hidden overflow-y-scroll">
    <div id="app">
        @yield('content')
    </div>

    @stack('scripts')

  </body>
</html>
