@extends('layouts.client')

@section('content')
    <div class="flex justify-between m-5 items-center">
        <p class="text-bblue text-3xl mx-5 font-normal">Client Details</p>
    </div>
    <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3 flex flex-col gap-2 py-2 px-5">
        <div>
            <p class="font-semibold text-bgray text-l ">Client Name: </p>
            <p class="font-medium text-xl">{{ $client->name }}</p>
        </div>
        <div>
            <p class="font-semibold text-bgray text-l ">Email Adress:</p>
            <p class="font-medium text-xl">{{ $client->email }}</p>
        </div>
        <div>
            <p class="font-semibold text-bgray text-l ">Phone No.:</p>
            <p class="font-medium text-xl">{{ $client->contact }}</p>
        </div>
        <div>
            <p class="font-semibold text-bgray text-l ">Address:</p>
            <p class="font-medium text-xl">{{ $client->address }}</p>
        </div>
        <div>
            <p class="font-semibold text-bgray text-l ">Created by:</p>
            <p class="font-medium text-xl">{{ $client->createdBy->name }}</p>
        </div>

    </div>

    <div class="flex justify-between m-5 items-center">
        <p class="text-bblue text-3xl mx-5 font-normal">Users</p>
        <div class="flex gap-3">
            @if ($client->role === 'admin')
                <a href="{{ route('client.users.create', $client->id) }}"
                    class=" bg-bblue text-white  p-3 mr-5 rounded-md w-auto inline-block">Add User</a>
            @endif
        </div>
    </div>

    <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3 flex flex-col gap-5 py-2 px-8">
        @foreach ($client->users as $user)
            @if ($user->id == $client->created_by)
                @continue
            @else
                <div class="flex gap-5">
                    <div>
                        <p class="font-semibold text-bgray text-l ">Name:</p>
                        <p class="font-medium text-xl">{{ $user->name }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-bgray text-l ">Email address:</p>
                        <p class="font-medium text-xl">{{ $user->email }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-bgray text-l ">Role:</p>
                        <p class="font-medium text-xl">{{ $user->role }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
