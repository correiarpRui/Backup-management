@extends('layouts.layout')

@section('content')
    <div class="w-[400px] flex flex-col justify-center m-auto mt-10 bg-white p-5 rounded-md shadow-md shadow-gray-400 ">
        <div class="text-2xl text-center text-bblue font-medium uppercase mb-4">Create Client</div>
        <form action="/clients" method="POST" class="flex flex-col gap-2">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="border-2 rounded-md focus:outline-none p-2 mb-2">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="border-2 rounded-md focus:outline-none p-2 mb-2">
            <label for="contact">Contact</label>
            <input type="text" name="contact" id="contact" class="border-2 rounded-md focus:outline-none p-2 mb-2">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="border-2 rounded-md focus:outline-none p-2 mb-2">
            <input type="submit" value="Create Client"
                class="block text-white bg-bblue w-fit m-auto py-2 px-4 rounded-md uppercase my-2 focus:outline-none">
        </form>
    </div>
@endsection
