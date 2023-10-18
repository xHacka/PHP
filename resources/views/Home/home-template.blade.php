<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    @stack("styles")
</head>

<body>
    @yield("whoami")

    @yield("actions")

    @yield("content")

    @stack("scripts")
</body>

</html>