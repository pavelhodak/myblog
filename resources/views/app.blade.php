<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="{{ asset('js/jquery-2.2.0.min.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    <script src="{{ asset('js/jquery-cookie/jquery.cookie.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/fancybox/source/jquery.fancybox.css') }}" type="text/css" media="screen" />
    <script src="{{ asset('js/fancybox/source/jquery.fancybox.pack.js') }}"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
</head>
<body>
<div class="container">
    @yield('content')
</div>

@yield('footer')
</body>
</html>