@extends('layouts.root')

@section('content')
    <div class="w-[400px] flex flex-col justify-center m-auto mt-10 bg-white p-5 rounded-md shadow-md shadow-gray-400 ">
        <div class="text-2xl text-center text-bblue font-medium uppercase mb-4">Create Client</div>
        <form action="{{ route('root.clients.store') }}" method="POST" class="flex flex-col gap-2">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', '') }}"
                class="border-2 rounded-md focus:outline-none p-2 mb-2">
            <span class="text-bred">{{ $errors->first('name') }}</span>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="{{ old('address', '') }}"
                class="border-2 rounded-md focus:outline-none p-2 mb-2">
            <span class="text-bred">{{ $errors->first('address') }}</span>

            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact" value="{{ old('contact', '') }}"
                class="border-2 rounded-md focus:outline-none p-2 mb-2">
            <span class="text-bred">{{ $errors->first('contact') }}</span>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', '') }}"
                class="border-2 rounded-md focus:outline-none p-2 mb-2">
            <span class="text-bred">{{ $errors->first('email') }}</span>

            <label>Users</label>
            @foreach ($users as $user)
                <div class="flex gap-2">
                    <input type="checkbox" value="{{ $user->id }}" name="users[]" id="{{ $user->id }}">
                    <label for="{{ $user->id }}">{{ $user->name }}</label>
                </div>
            @endforeach
            <button
                class="block text-white bg-bblue w-fit m-auto py-2 px-4 rounded-md uppercase my-2 focus:outline-none">Create</button>
        </form>
    </div>
@endsection
