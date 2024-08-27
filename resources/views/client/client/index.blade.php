<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="bg-blgray flex h-screen">
    <div class="w-[400px] flex flex-col justify-center m-auto bg-white p-5 rounded-md shadow-md shadow-gray-400">
        <div class="text-2xl text-center text-bblue font-medium uppercase mb-6">Select Client</div>
        @foreach ($clients as $client)
            <a href="{{ route('client.clients.show', $client->id) }}"
                class="border-2 hover:bg-bblue hover:text-white rounded-md text-center p-2 mb-4">{{ $client->name }}</a>
        @endforeach
    </div>
</body>
