<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Gameon - @yield('title')</title>
        <meta name="description" content="Gameon est un site communautaire qui vous permet de créer votre propre bibliothèque de jeux vidéo!">
        {{-- CSS --}}
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    </head>

    <body>
        @yield('content')
    </body>
</html>
