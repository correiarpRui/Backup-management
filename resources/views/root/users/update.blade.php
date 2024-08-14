@extends('layouts.root')

@section('content')
    <div>

        <div class="w-[400px] flex flex-col justify-center m-auto mt-10 bg-white p-5 rounded-md shadow-md shadow-gray-400 ">
            <div class="text-2xl text-center text-bblue font-medium uppercase mb-4"> User Data</div>
            <form action="{{ route('root.users.patch', $user->id) }}" method="POST" class="flex flex-col gap-2">
                @csrf
                @method('PATCH')
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $user->name }}"
                    class="border-2 rounded-md focus:outline-none p-2 mb-2">
                <span class="text-bred">{{ $errors->first('name') }}</span>
                <label for="email">Email: </label>
                <input type="email" name="email" value="{{ $user->email }}"
                    class="border-2 rounded-md focus:outline-none p-2 mb-2">
                <span class="text-bred">{{ $errors->first('email') }}</span>
                <label for="password">Password: </label>
                <input type="password" name="password" class="border-2 rounded-md focus:outline-none p-2 mb-2">
                <span class="text-bred">{{ $errors->first('password') }}</span>
                <button
                    class="block text-white bg-bblue w-fit m-auto py-2 px-4 rounded-md uppercase my-2 focus:outline-none">Save</button>
            </form>
        </div>
    </div>
@endsection


{{-- <label for="access_key">Access Key: </label>
                <input type="text" name="access_key" value="{{ $user->access_key }}"
                    class="border-2 rounded-md focus:outline-none p-2 mb-2">
                <label for="secret_key">Secret Key: </label>
                <input type="text" name="secret_key" value="{{ $user->secret_key }}"
                    class="border-2 rounded-md focus:outline-none p-2 mb-2"> --}}
