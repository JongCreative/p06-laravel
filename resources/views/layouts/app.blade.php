<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'p06 - project 6 laravel')}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- @include('inc.styles') --}}
    
</head>
<body>
    <main class="main-positioning">

        <div class="positioning positioning1">
            @include('inc.navbar')
        </div>
        <div class="positioning positioning2">
            {{-- @include('inc.messages') --}}
        </div>
        <div class="positioning positioning3">
            @yield('content')
        </div>

    </main>
</body>
</html>
