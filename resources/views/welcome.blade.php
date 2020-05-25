<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body class="fondo">
        <div id="app" >
            @if (Auth::check())
                <main-app :usuario="{{Auth::user()}}"></main-app>
            @else
                <main-app :usuario="false"></main-app>
            @endif
        </div>



        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
