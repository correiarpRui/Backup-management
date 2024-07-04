@extends('layouts.admin')

@section('content')
    <div>
        <div class="text-bblue text-3xl mx-5 my-3 font-normal ">Clients</div>
        <a href="/admin/clients/create" class=" bg-bblue text-white mx-5 my-3 p-3 rounded-md w-auto inline-block">Create
            Client</a>
        <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3 flex gap-2 flex-col">
            @foreach ($clients as $client)
                <div class="flex gap-4">
                    <p>{{ $client->name }}</p>
                    <p>{{ $client->address }}</p>
                    <p>{{ $client->contact }}</p>
                    <p>{{ $client->email }}</p>
                    <form action="/admin/clients/{{ $client->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="text-bred">
                    </form>
                    <form action="/admin/clients/{{ $client->id }}" method="POST">
                        @csrf

                        <select name="users" id="users" class="border-2 rounded-md focus:outline-none p-2 mb-2">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>

                        <input type="submit" value="Add User" class="text-bblue">
                    </form>
                    @foreach ($client->user as $user)
                        <p>{{ $user->name }}</p>
                    @endforeach

                </div>
            @endforeach
        </div>
    </div>
@endsection
