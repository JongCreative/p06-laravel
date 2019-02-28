<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <title>{{config('app.name', 'p06 - project 6 laravel')}}</title>
        @include('inc.styles')

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

