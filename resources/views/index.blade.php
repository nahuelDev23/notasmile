<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>🔥 Notas de mi bb 🔥</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{secure_asset('css/app.css')}}" rel="stylesheet">
        @laravelPWA
    </head>
    <body>
        <div id="app" class="l-container">
        <app></app>
        </div>
        <script src="{{secure_asset('js/app.js')}}"></script>
    </body>
</html>
