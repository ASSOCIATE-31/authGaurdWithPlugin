<html>
    <head>
        @include('user.layouts.header')
        @include('user.layouts.link')
        @yield('content')
       <title>Auth Guard</title>
      <!-- <link rel="icon" type="image/x-icon" href="{{ asset('icons/favicon.ico') }}"> -->
    </head>
    <body>
    </body>
    <footer>
        @include('user.layouts.footer')
    </footer>
</html>