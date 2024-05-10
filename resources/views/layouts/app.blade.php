<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __(config('app.name')) }}</title>

    @component('atlas::components.common.favicon') @endcomponent

    @vite('resources/css/app.css')

</head>

<body>

    @yield('content')

</body>

</html>
