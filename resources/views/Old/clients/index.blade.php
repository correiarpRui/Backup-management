@extends('layouts.layout')

@section('content')
    <div>
        <div class="text-bblue text-3xl mx-5 my-3 font-normal ">Clients</div>
        <a href="/clients/create" class=" bg-bblue text-white mx-5 my-3 p-3 rounded-md w-auto inline-block">Create Client</a>
        <div class="bg-white mx-5 shadow-md shadow-gray-300 rounded-md my-3 flex gap-2 flex-col">
            @foreach ($clients as $client)
                <div class="flex gap-4">
                    <p>{{ $client->name }}</p>
                    <p>{{ $client->address }}</p>
                    <p>{{ $client->contact }}</p>
                    <p>{{ $client->email }}</p>
                    <form action="/clients/{{ $client->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="text-bred">
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
