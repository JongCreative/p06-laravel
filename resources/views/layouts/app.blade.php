<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('customApp.css')}}">

        <title>{{config('app.name', 'p06 - project 6 laravel')}}</title>
        @include('inc.styles')

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @include('inc.navbar')

            <div class="content">
                    <div class="title m-b-md"></div>
                @yield('content')
            </div>
        </div>
    </body>
</html>

