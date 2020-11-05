<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>