<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="bg-blgray">
    <nav
        class="flex text-xl justify-between items-center border-2 px-5 py-4 text-bblue shadow-md shadow-gray-300 bg-white">
        <div class="flex gap-5 text-base">
            <a href="/client/backups" class="uppercase font-semibold">Backups</a>
            <a href="/client/events" class="uppercase font-semibold">Events</a>
        </div>
        <div class="flex gap-5">
            @auth
                <a href="/client/user" class="uppercase font-semibold text-base">{{ auth()->user()->name }}
                    {{ auth()->user()->role }}</a>
            @endauth

            <a href="/logout" class="uppercase font-semibold text-base">Logout</a>
        </div>
    </nav>
    @yield('content')
</body>

</html>
