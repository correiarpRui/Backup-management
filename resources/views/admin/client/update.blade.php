@extends('layouts.admin')

@section('content')
    <div class="w-[400px] flex flex-col justify-center m-auto mt-10 bg-white p-5 rounded-md shadow-md shadow-gray-400 ">
        <div class="text-2xl text-center text-bblue font-medium uppercase mb-4">Edit Client</div>
        <form action="{{ route('admin.clients.patch', $client->id) }}" method="POST" class="flex flex-col gap-2">
            @csrf
            @method('PATCH')
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="border-2 rounded-md focus:outline-none p-2 mb-2"
                value="{{ $client->name }}">
            <span class="text-bred">{{ $errors->first('name') }}</span>

            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="border-2 rounded-md focus:outline-none p-2 mb-2"
                value="{{ $client->address }}">
            <span class="text-bred">{{ $errors->first('address') }}</span>

            <label for="contact">Contact</label>
            <input type="text" name="contact" id="contact" class="border-2 rounded-md focus:outline-none p-2 mb-2"
                value="{{ $client->contact }}">
            <span class="text-bred">{{ $errors->first('contact') }}</span>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="border-2 rounded-md focus:outline-none p-2 mb-2"
                value="{{ $client->email }}">
            <span class="text-bred">{{ $errors->first('email') }}</span>
            <label>Users</label>

            {{-- maybe easier way --}}
            {{-- @foreach ($client->users as $user)
                @if ($user['id'] != $client->created_by)
                    <div class="flex gap-2">
                        <input type="checkbox" value="{{ $user->id }}" name="users[]" id="{{ $user->id }}" checked>
                        <label for="{{ $user->id }}">{{ $user->name }}</label>
                    </div>
                @endif
            @endforeach --}}
            @foreach ($users as $user)
                @if ($user->id == $client->created_by)
                    @continue
                @endif
                <div class="flex gap-2">
                    <input type="checkbox" value="{{ $user->id }}" name="users[]" id="{{ $user->id }}"
                        @checked($client->users->contains('id', $user->id))>
                    <label for="{{ $user->id }}">{{ $user->name }}</label>
                </div>
            @endforeach

            <button
                class="block text-white bg-bblue w-fit m-auto py-2 px-4 rounded-md uppercase my-2 focus:outline-none">Edit
                Client</button>
        </form>
    </div>
@endsection
