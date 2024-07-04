@extends('layouts.admin')

@section('content')
    <div>
        <div class="text-bblue text-3xl mx-5 my-3 font-normal ">Users</div>

        <a href="/admin/users/create" class=" bg-bblue text-white mx-5 my-3 p-3 rounded-md w-auto inline-block">Create
            User</a>
        <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3">
            @foreach ($users as $user)
                <div class="flex gap-4">
                    <p>Name: {{ $user->name }}</p>
                    <p>Email: {{ $user->email }}</p>
                </div>
            @endforeach
        </div>

    </div>
@endsection
