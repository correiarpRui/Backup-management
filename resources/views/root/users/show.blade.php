@extends('layouts.root')

@section('content')
    <div class="flex justify-between m-5 items-center">
        <p class="text-bblue text-3xl mx-5 font-normal">User Details</p>
    </div>


    <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3 flex flex-col gap-2 py-2 px-5">
        <div>
            <p class="font-semibold text-bgray text-l ">User Name: </p>
            <p class="font-medium text-xl">{{ $user->name }}</p>
        </div>
        <div>
            <p class="font-semibold text-bgray text-l ">Email Adress:</p>
            <p class="font-medium text-xl">{{ $user->email }}</p>
        </div>
        <div>
            <p class="font-semibold text-bgray text-l ">Role:</p>
            <p class="font-medium text-xl">{{ $user->role }}</p>
        </div>
        @if ($user->role === 'root')
            <div>
                <p class="font-semibold text-bgray text-l ">Access Key:</p>
                <p class="font-medium text-xl">{{ $user->access_key }}</p>
            </div>
            <div>
                <p class="font-semibold text-bgray text-l ">Secret Key:</p>
                <p class="font-medium text-xl">{{ $user->secret_key }}</p>
            </div>
        @endif
        <div class="flex gap-2">
            <form action="{{ route('root.users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="text-bred cursor-pointer">
            </form>
            <a href="{{ route('root.users.update', $user->id) }}">Edit</a>
        </div>


    </div>
@endsection
