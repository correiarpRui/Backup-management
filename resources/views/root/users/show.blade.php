@extends('layouts.root')

@section('content')
    <div class="flex justify-between m-5 items-center">
        <p class="text-bblue text-3xl mx-5 font-normal">User Details</p>
        <div class="flex gap-3">
            <a href="{{ route('root.users.update', $user->id) }}"
                class=" bg-bblue text-white  p-3 rounded-md w-auto inline-block">Edit</a>
            <form action="{{ route('root.users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class=" bg-bred text-white p-3 mr-5 rounded-md w-auto inline-block">Delete </button>
            </form>
        </div>
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

    </div>

    @if ($user->role === 'root')
        <div class="flex justify-between m-5 items-center">
            <p class="text-bblue text-3xl mx-5 font-normal">Keys</p>
            <div class="flex gap-3">
                <a href="{{ route('root.users.update.key', $user->id) }}"
                    class=" bg-bblue text-white  p-3 mr-5 rounded-md w-auto inline-block">Edit</a>

            </div>
        </div>

        <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3 flex flex-col gap-2 py-2 px-5">
            <div>
                <p class="font-semibold text-bgray text-l ">Access Key:</p>
                <p class="font-medium text-xl">{{ $user->access_key }}</p>
            </div>
            <div>
                <p class="font-semibold text-bgray text-l ">Secret Key:</p>
                <p class="font-medium text-xl">{{ $user->secret_key }}</p>
            </div>
        </div>
    @endif
@endsection
