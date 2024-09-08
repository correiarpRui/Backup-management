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
            <a href="{{ route('root.clients') }}" class="uppercase font-semibold">Clients</a>
            <a href="{{ route('root.backups') }}" class="uppercase font-semibold">Backups</a>
            <a href="{{ route('root.events') }}" class="uppercase font-semibold">Events</a>
            <a href="{{ route('root.users') }}" class="uppercase font-semibold">Users</a>
        </div>
        <div>
            <div class="uppercase font-semibold border-2 rounded-full border-bblue w-[30px] h-[30px] text-center hover:bg-bblue hover:text-white text-base"
                onclick="toggle()" id="profile">
                <p>{{ mb_substr(auth()->user()->name, 0, 1) }}</p>

            </div>
            <div class="hidden absolute bg-white right-5 top-14 px-3 py-3 rounded-md border-2 border-borderColor shadow-md shadow-gray-300 w-[250px]"
                id="menu">
                <div class="flex gap-3 items-center mb-3 ml-2">
                    <div
                        class="uppercase font-semibold border-2 rounded-full border-bblue text-2xl size-12 flex justify-center items-center">
                        <div>
                            {{ mb_substr(auth()->user()->name, 0, 1) }}
                        </div>
                    </div>
                    <p>{{ auth()->user()->name }}</p>
                </div>
                <hr class="border">
                <div class="flex flex-col gap-2 my-2">
                    @auth
                        <a href="{{ route('root.users.show', auth()->user()->id) }}"
                            class=" font-semibold text-lg px-2 rounded-md hover:bg-borderColor">Profile</a>
                    @endauth
                    <a href="/logout" class=" font-semibold text-lg px-2 rounded-md hover:bg-borderColor">Log
                        out</a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
<script>
    function toggle() {

        const menu = document.getElementById('menu');
        if (menu.style.display === "") {
            menu.style.display = "block"
        } else {
            menu.style.display = ""
        }
    }
</script>

</html>
