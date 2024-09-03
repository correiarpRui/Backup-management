@extends('layouts.client')

@section('content')
    <div class="w-[400px] flex flex-col justify-center m-auto mt-10 bg-white p-5 rounded-md shadow-md shadow-gray-400 ">
        <div class="text-2xl text-center text-bblue font-medium uppercase mb-4">Create User</div>
        <form action="{{ route('client.users.store', $client->id) }}" method="POST" class="flex flex-col gap-2">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="border-2 rounded-md focus:outline-none p-2 mb-2"
                value="{{ old('name', '') }}">
            <span class="text-bred">{{ $errors->first('name') }}</span>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="border-2 rounded-md focus:outline-none p-2 mb-2"
                value="{{ old('email', '') }}">
            <span class="text-bred">{{ $errors->first('email') }}</span>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="border-2 rounded-md focus:outline-none p-2 mb-2">
            <span class="text-bred">{{ $errors->first('password') }}</span>

            <label for="role">Role</label>
            <select name="role" id="role" class="border-2 p-2 rounded-md focus:outline-none">
                <option value="admin">Admin</option>
                <option value="client">Client</option>
            </select>

            <input type="submit" value="Create User"
                class="block text-white bg-bblue w-fit m-auto py-2 px-4 rounded-md uppercase my-2 focus:outline-none">
        </form>
    </div>
@endsection
