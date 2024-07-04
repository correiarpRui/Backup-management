@extends('layouts.admin')

@section('content')
    <div>
        <div class="text-bblue text-3xl mx-5 my-3 font-normal ">{{ $user->name }}</div>
        <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3">
            <p>Name:{{ $user->name }}</p>
            <p>Email:{{ $user->email }}</p>
            <p>Access Key: {{ $user->access_key }}</p>
            <p>Secret Key: {{ $user->secret_key }}</p>
        </div>
        <a href="/admin/user/update" class=" bg-bblue text-white mx-5 my-3 p-3 rounded-md w-auto inline-block">Change Keys</a>
    </div>


    </div>
@endsection
