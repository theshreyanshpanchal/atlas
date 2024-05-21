<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __(config('app.name')) }}</title>

    @component('atlas::components.common.favicon') @endcomponent

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Typography -->
    <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/typography@0.4.1/dist/typography.min.css" rel="stylesheet">

</head>

<body>

    @yield('content')

</body>

</html>
