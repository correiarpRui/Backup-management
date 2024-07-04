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
        <div class="text-2xl text-center text-bblue font-medium uppercase mb-4">Login</div>
        <form action="/login" method="POST" class="flex flex-col gap-2">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="border-2 rounded-md focus:outline-none p-2 mb-2">
            @error('email')
                <p class="text-bred">{{ $message }}</p>
            @enderror
            <label for="password">Password</label>
            <input type="password" name="password" id="password"
                class="border-2 rounded-md focus:outline-none p-2 mb-2">
            @error('password')
                <p class="text-bred">{{ $message }}</p>
            @enderror
            <input type="submit" value="Login"
                class="block text-white bg-bblue w-fit m-auto py-2 px-4 rounded-md uppercase my-2 focus:outline-none">
        </form>
    </div>
</body>
