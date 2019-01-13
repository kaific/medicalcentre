<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src="{{asset ('js/app.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name', 'Medical Centre')}}</title>
    </head>
    <body>
        @include('inc.navbar')
        <div class="container pt-3">
            <!-- Load page content -->
            @yield('content')
        </div>
    </body>
</html>
