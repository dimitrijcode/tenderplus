<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'TenderFinder') }}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
    </head>
    <body>
    <div style="background-color: #f0f0f0; padding: 10px;">
        Logo |
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('tenders.index') }}">Tenders</a>
    </div>

    {{ $slot }}

    <div style="background-color: #000000; padding: 10px; color: #03FF03;">
        Footer comes here
    </div>

    </body>
</html>
