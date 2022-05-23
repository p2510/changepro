<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'changepro') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="shortcut icon" href="{{url("public/storage/img/logo.png")}}" type="image/x-icon">
        <!-- Styles -->
        <link rel="stylesheet" href="./../../css/app.css">

        <!-- Scripts -->
        @routes
        <script src="./../../js/app.js " defer></script>
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        
        @inertia

        @env ('local')
            <script src="http://127.0.0.1:8080/js/bundle.js"></script>
        @endenv
    </body>
</html>
