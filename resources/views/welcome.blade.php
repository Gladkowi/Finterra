<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css.css') }}">
    @livewireStyles
    <script src="./blog/resources/js/app.js" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Продуктовый магазин</title>
    
</head>

<body>
   

    <script src="{{ asset('j.js') }}" defer></script>
    <script src="{{ asset('js.js') }}" defer></script>

    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    @livewireScripts
</body>

</html>
