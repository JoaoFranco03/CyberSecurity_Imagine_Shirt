<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{$order->id}}</title>
    <script defer src=" https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>
</head>

<body class="bg-white dark:bg-gray-900">
    @yield('content')
</body>

</html>
