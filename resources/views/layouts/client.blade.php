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

        <div class="flex gap-5 text-base ">
            <div class="uppercase font-semibold group"> Clients
                <div class="absolute hidden group-hover:block left-0 px-5 pb-4 bg-white rounded-md">
                    <div>
                        @foreach ($clients as $userClients)
                            <a href="{{ route('client.clients.show', $userClients->id) }}"
                                class="uppercase font-semibold block mt-3">{{ $userClients->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="{{ route('client.backups', $client->id) }}" class="uppercase font-semibold">Backups</a>
            <a href="{{ route('client.events', $client->id) }}" class="uppercase font-semibold">Events</a>
            <a href="{{ route('client.users', $client->id) }}" class="uppercase font-semibold">Users</a>
        </div>

        <div class="flex gap-5">
            @auth
                <a href="/client/user" class="uppercase font-semibold text-base">{{ auth()->user()->name }}
                    {{ auth()->user()->role }}</a>
            @endauth
            <a href="/logout" class="uppercase font-semibold text-base">Logout</a>
        </div>
        {{-- $client --}}
    </nav>
    @yield('content')
</body>

</html>
