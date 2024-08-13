@extends('layouts.admin')

@section('content')
    <div class="grid grid-cols-2">
        <div class="text-bblue text-3xl mx-5 mt-4 font-normal px-5 ">Client Details</div>
        <div class="text-bblue text-3xl mx-5 mt-4 font-normal px-8">Users</div>
    </div>
    <div class="grid grid-cols-2  gap-1 py-2">
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
            <div class="flex gap-2">
                <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="text-bred cursor-pointer">
                </form>
                <a href="{{ route('admin.clients.update', $client->id) }}">Edit</a>
            </div>
        </div>
        <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3 flex flex-col gap-5 py-2 px-8">
            @foreach ($client->users as $user)
                <div class="flex gap-5">
                    <div>
                        <p class="font-semibold text-bgray text-l ">Name:</p>
                        <p class="font-medium text-xl">{{ $user->name }}</p>
                    </div>
                    <div>
                        <p class="font-semibold text-bgray text-l ">Email address:</p>
                        <p class="font-medium text-xl">{{ $user->email }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-bblue text-3xl mx-5 font-normal px-5 ">Backups</div>
        <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3 flex flex-col col-span-2 gap-2 py-2 px-8">
            <p>Backups</p>
        </div>
    </div>
@endsection
